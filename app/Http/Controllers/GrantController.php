<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Grant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function store(Request $request, Company $company): RedirectResponse
    {
        $validated = $request->validate([
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'start' => 'required|date:Y-m-d',
            'end' => 'nullable|date:Y-m-d|after:start',
            'category_id' => 'required|exists:categories,id',
        ]);

        $grant = new Grant($validated);
        $grant->created_by()->associate($request->user());
        $company->grants()->save($grant);

        return redirect()->route('companies.show', $company)->with('success', __('Grant saved.'));
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
