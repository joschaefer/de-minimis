<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Company::class);
    }

    public function index(): View
    {
        return view('companies.index', [
            'companies' => Company::query()->orderByName()->get(),
        ]);
    }

    public function store(CompanyRequest $request): RedirectResponse
    {
        $company = new Company($request->validated());
        $company->save();

        for ($i = 0; $i < count($request->last_names); $i++) {
            $company->contacts()->create([
                'last_name' => $request->last_names[$i],
                'first_name' => $request->first_names[$i],
                'email' => $request->emails[$i],
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

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        $company->contacts()->delete();
        for ($i = 0; $i < count($request->last_names); $i++) {
            $company->contacts()->create([
                'last_name' => $request->last_names[$i],
                'first_name' => $request->first_names[$i],
                'email' => $request->emails[$i],
            ]);
        }

        return redirect()->route('companies.show', $company)->with('success', __('Company updated.'));
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', __('Company deleted.'));
    }
}
