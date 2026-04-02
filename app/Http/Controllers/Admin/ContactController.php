<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactContent;
use App\Models\ContactFormField;
use App\Models\ContactLocation;
use App\Models\ContactQuickCard;
use App\Models\ContactSupportCard;
use App\Models\ContactSupportHighlight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function edit(): View
    {
        $contactContent = ContactContent::query()->first();
        if (!$contactContent) {
            $contactContent = ContactContent::query()->create([]);
        }

        $quickCards = ContactQuickCard::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $formFields = ContactFormField::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $locations = ContactLocation::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $supportCards = ContactSupportCard::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $supportHighlights = ContactSupportHighlight::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.kontak.edit', [
            'contactContent' => $contactContent,
            'quickCards' => $quickCards,
            'formFields' => $formFields,
            'locations' => $locations,
            'supportCards' => $supportCards,
            'supportHighlights' => $supportHighlights,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->contactContentRules(), [
            'hero_small_button_link.regex' => 'Format link tombol hero tidak valid.',
            'closing_strip_button_link.regex' => 'Format link tombol closing strip tidak valid.',
        ]);

        $contactContent = ContactContent::query()->first();
        if (!$contactContent) {
            $contactContent = ContactContent::query()->create([]);
        }

        $contactContent->update($validated);

        return back()->with('success', 'Konten utama Kontak & Support berhasil diperbarui.');
    }

    public function storeQuickCard(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->quickCardRules(), [
            'button_link.regex' => 'Format link tombol quick card tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        ContactQuickCard::query()->create($validated);

        return back()->with('success', 'Quick support card berhasil ditambahkan.');
    }

    public function updateQuickCard(Request $request, int $id): RedirectResponse
    {
        $card = ContactQuickCard::query()->findOrFail($id);
        $validated = $request->validate($this->quickCardRules(), [
            'button_link.regex' => 'Format link tombol quick card tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        $card->update($validated);

        return back()->with('success', 'Quick support card berhasil diperbarui.');
    }

    public function destroyQuickCard(int $id): RedirectResponse
    {
        $card = ContactQuickCard::query()->findOrFail($id);
        $card->delete();

        return back()->with('success', 'Quick support card berhasil dihapus.');
    }

    public function storeFormField(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->formFieldRules());
        $validated['is_required'] = $request->boolean('is_required');
        $validated['is_active'] = $request->boolean('is_active');

        $validated['options_json'] = $this->parseOptionsJson(
            $request->input('options_json_text'),
            $validated['field_type'] === 'select'
        );

        unset($validated['options_json_text']);

        ContactFormField::query()->create($validated);

        return back()->with('success', 'Field form kontak berhasil ditambahkan.');
    }

    public function updateFormField(Request $request, int $id): RedirectResponse
    {
        $field = ContactFormField::query()->findOrFail($id);
        $validated = $request->validate($this->formFieldRules($field->id));
        $validated['is_required'] = $request->boolean('is_required');
        $validated['is_active'] = $request->boolean('is_active');

        $validated['options_json'] = $this->parseOptionsJson(
            $request->input('options_json_text'),
            $validated['field_type'] === 'select'
        );

        unset($validated['options_json_text']);

        $field->update($validated);

        return back()->with('success', 'Field form kontak berhasil diperbarui.');
    }

    public function destroyFormField(int $id): RedirectResponse
    {
        $field = ContactFormField::query()->findOrFail($id);
        $field->delete();

        return back()->with('success', 'Field form kontak berhasil dihapus.');
    }

    public function storeLocation(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->locationRules(), [
            'button_link.regex' => 'Format link tombol lokasi tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        ContactLocation::query()->create($validated);

        return back()->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function updateLocation(Request $request, int $id): RedirectResponse
    {
        $location = ContactLocation::query()->findOrFail($id);
        $validated = $request->validate($this->locationRules(), [
            'button_link.regex' => 'Format link tombol lokasi tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        $location->update($validated);

        return back()->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroyLocation(int $id): RedirectResponse
    {
        $location = ContactLocation::query()->findOrFail($id);
        $location->delete();

        return back()->with('success', 'Lokasi berhasil dihapus.');
    }

    public function storeSupportCard(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->supportCardRules(), [
            'button_link.regex' => 'Format link tombol support card tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        ContactSupportCard::query()->create($validated);

        return back()->with('success', 'Customer support card berhasil ditambahkan.');
    }

    public function updateSupportCard(Request $request, int $id): RedirectResponse
    {
        $card = ContactSupportCard::query()->findOrFail($id);
        $validated = $request->validate($this->supportCardRules(), [
            'button_link.regex' => 'Format link tombol support card tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        $card->update($validated);

        return back()->with('success', 'Customer support card berhasil diperbarui.');
    }

    public function destroySupportCard(int $id): RedirectResponse
    {
        $card = ContactSupportCard::query()->findOrFail($id);
        $card->delete();

        return back()->with('success', 'Customer support card berhasil dihapus.');
    }

    public function storeSupportHighlight(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->supportHighlightRules());
        $validated['is_active'] = $request->boolean('is_active');

        ContactSupportHighlight::query()->create($validated);

        return back()->with('success', 'Support highlight berhasil ditambahkan.');
    }

    public function updateSupportHighlight(Request $request, int $id): RedirectResponse
    {
        $highlight = ContactSupportHighlight::query()->findOrFail($id);
        $validated = $request->validate($this->supportHighlightRules());
        $validated['is_active'] = $request->boolean('is_active');

        $highlight->update($validated);

        return back()->with('success', 'Support highlight berhasil diperbarui.');
    }

    public function destroySupportHighlight(int $id): RedirectResponse
    {
        $highlight = ContactSupportHighlight::query()->findOrFail($id);
        $highlight->delete();

        return back()->with('success', 'Support highlight berhasil dihapus.');
    }

    private function contactContentRules(): array
    {
        return [
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string'],
            'hero_small_button_text' => ['nullable', 'string', 'max:100'],
            'hero_small_button_link' => $this->linkRules(),
            'contact_form_title' => ['required', 'string', 'max:255'],
            'contact_form_description' => ['required', 'string'],
            'contact_form_submit_text' => ['required', 'string', 'max:100'],
            'contact_form_checkbox_text' => ['required', 'string'],
            'locations_section_title' => ['required', 'string', 'max:255'],
            'support_section_title' => ['required', 'string', 'max:255'],
            'support_section_description' => ['required', 'string'],
            'support_highlight_text' => ['nullable', 'string'],
            'closing_strip_text' => ['required', 'string'],
            'closing_strip_button_text' => ['required', 'string', 'max:100'],
            'closing_strip_button_link' => $this->linkRules(),
        ];
    }

    private function quickCardRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_link' => $this->linkRules(),
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function formFieldRules(?int $id = null): array
    {
        return [
            'field_key' => [
                'required',
                'string',
                'max:100',
                'regex:/^[a-z][a-z0-9_]*$/',
                Rule::unique('contact_form_fields', 'field_key')->ignore($id),
            ],
            'label' => ['required', 'string', 'max:255'],
            'field_type' => ['required', 'string', Rule::in(['text', 'email', 'tel', 'select', 'textarea'])],
            'placeholder' => ['nullable', 'string', 'max:255'],
            'options_json_text' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_required' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function locationRules(): array
    {
        return [
            'location_type' => ['required', 'string', Rule::in(['ho', 'pool', 'other'])],
            'title' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'operation_hours' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_link' => $this->linkRules(),
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function supportCardRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'contact_label' => ['nullable', 'string', 'max:100'],
            'contact_value' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_link' => $this->linkRules(),
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function supportHighlightRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function linkRules(): array
    {
        return [
            'nullable',
            'string',
            'max:255',
            'regex:/^(#[A-Za-z0-9\-_:.]+|\/[A-Za-z0-9\-._~\/]*|https?:\/\/[^\s]+)$/',
        ];
    }

    private function parseOptionsJson(?string $rawValue, bool $required): ?array
    {
        $rawValue = trim((string) $rawValue);

        if ($rawValue === '') {
            if ($required) {
                throw ValidationException::withMessages([
                    'options_json_text' => 'Options JSON wajib diisi untuk field type select.',
                ]);
            }

            return null;
        }

        $decoded = json_decode($rawValue, true);
        if (!is_array($decoded)) {
            throw ValidationException::withMessages([
                'options_json_text' => 'Options JSON harus berupa array JSON yang valid.',
            ]);
        }

        foreach ($decoded as $index => $item) {
            if (!is_array($item) || !isset($item['value']) || !isset($item['label'])) {
                throw ValidationException::withMessages([
                    'options_json_text' => 'Setiap item options JSON harus memiliki key value dan label. Error pada index ' . $index . '.',
                ]);
            }
        }

        return $decoded;
    }
}
