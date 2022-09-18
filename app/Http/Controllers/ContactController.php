<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contacts.index', [
            'contacts' => Contact::query()->orderByName()->get(),
        ]);
    }

    public function create(Company $company): View
    {
        return view('contacts.create', compact('company'));
    }

    public function store(Request $request, Company $company): RedirectResponse
    {
        $validated = $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'email' => 'required|max:255|email',
        ]);

        $contact = new Contact($validated);
        $company->contacts()->save($contact);

        return redirect()->route('companies.show', $company)->with('success', __('Contact saved.'));
    }

    public function edit(Contact $contact): View
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'email' => 'required|max:255|email',
        ]);

        $contact->update($validated);

        return redirect()->route('companies.show', $contact->company)->with('success', __('Contact updated.'));
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('companies.show', $contact->company)->with('success', __('Contact deleted.'));
    }
}
