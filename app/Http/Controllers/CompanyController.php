<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('companies.index', [
            'companies' => Company::query()->orderByName()->get(),
        ]);
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:companies',
            'founded_at' => 'nullable|date',
            'register_court' => 'nullable|max:255',
            'register_number' => 'nullable|max:100',
            'last_names' => 'array|min:1',
            'last_names.*' => 'max:100',
            'first_names' => 'array|min:1',
            'first_names.*' => 'max:100',
            'emails' => 'array|min:1',
            'emails.*' => 'email|max:255',
        ]);

        $company = new Company($validated);
        $company->save();

        for ($i = 0; $i < count($validated['last_names']); $i++) {
            $company->contacts()->create([
                'last_name' => $validated['last_names'][$i],
                'first_name' => $validated['first_names'][$i],
                'email' => $validated['emails'][$i],
            ]);
        }

        return redirect()->route('companies.show', $company)->with('success', __('Company saved.'));
    }

    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:companies,name,' . $company->id,
        ]);

        $company->update($validated);

        return redirect()->route('companies.show', $company)->with('success', __('Company updated.'));
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', __('Company deleted.'));
    }
}
