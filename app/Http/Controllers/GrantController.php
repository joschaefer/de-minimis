<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Grant;
use App\Services\SpreadsheetParser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\Exception;

class GrantController extends Controller
{
    public function index(?Company $company = null): View
    {
        if ($company) {
            return view('grants.index', [
                'company' => $company,
                'grants' => $company->grants,
            ]);
        }

        return view('grants.index', [
            'grants' => Grant::query()->orderByDate()->get(),
        ]);
    }

    public function create(Company $company): View
    {
        return view('grants.create', compact('company'));
    }

    public function store(Request $request, ?Company $company = null): RedirectResponse
    {
        $rules = [
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'start' => 'required|date:Y-m-d',
            'end' => 'nullable|date:Y-m-d|after:start',
            'category_id' => 'required|exists:categories,id',
        ];

        $rules += is_null($company)
            ? ['company_id' => 'required|exists:companies,id']
            : ['company_id' => 'sometimes|in:' . $company->id];

        $validated = $request->validate($rules);

        if (is_null($company)) {
            $company = Company::query()->find($validated['company_id']);
        }

        $grant = new Grant($validated);
        $grant->created_by()->associate($request->user());
        $company->grants()->save($grant);

        return redirect()->route('companies.show', $company)->with('success', __('Grant saved.'));
    }


    public function import(Request $request, ?Company $company = null): RedirectResponse
    {
        $rules = [
            'list' => ['required', 'mimes:' . implode(',', SpreadsheetParser::getSupportedFileEndings()), 'max:8192'],
            'category_id' => 'required|exists:categories,id',
        ];

        $rules += is_null($company)
            ? ['company_id' => 'required|exists:companies,id']
            : ['company_id' => 'sometimes|in:' . $company->id];

        $validated = $request->validate($rules);

        if (is_null($company)) {
            $company = Company::query()->find($validated['company_id']);
        }

        try {
            $spreadsheet = new SpreadsheetParser;
            $spreadsheet->setTitleRowIndex(10);
            $spreadsheet->load($request->file('list')->getPathname());
            $spreadsheet->findColumn('description', ['Anlage']);
            $spreadsheet->findColumn('value', ['Restbuchwert (31.12 akt. Jahr)']);

            $entries = $spreadsheet->parse();
        } catch (Exception) {
            return redirect()->route('companies.show', ['company' => $company])
                ->withErrors(['errors' => __('Could not read file.')]);
        }

        foreach ($entries as $entry) {
            $amount = $this->parseFloat($entry['value']);

            if ($amount > 0) {
                $grant = new Grant([
                    'description' => 'Anlage #' . $entry['description'],
                    'amount' => $amount,
                    'start' => today(),
                    'category_id' => $validated['category_id'],
                ]);
                $grant->created_by()->associate($request->user());
                $company->grants()->save($grant);
            }
        }

        return redirect()->route('companies.show', $company)->with('success', __('Grants imported.'));
    }

    private function parseFloat(string $value): float
    {
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);

        return (float) $value;
    }

    public function edit(Grant $grant): View
    {
        return view('grants.edit', compact('grant'));
    }

    public function update(Request $request, Grant $grant): RedirectResponse
    {
        $validated = $request->validate([
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'start' => 'required|date:Y-m-d',
            'end' => 'required|date:Y-m-d|after:start',
            'category_id' => 'required|exists:categories,id',
        ]);

        $grant->update($validated);

        return redirect()->route('companies.show', $grant->company)->with('success', __('Grant updated.'));
    }

    public function destroy(Grant $grant): RedirectResponse
    {
        $grant->delete();

        return redirect()->route('companies.show', $grant->company)->with('success', __('Grant deleted.'));
    }

    public function preview(Company $company): View
    {
        return view('grants.preview', [
            'company' => $company,
        ]);
    }
}
