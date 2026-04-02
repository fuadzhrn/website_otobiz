<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JoinContent;
use App\Models\JoinFormField;
use App\Models\JoinSalesContact;
use App\Models\JoinSalesHighlight;
use App\Models\JoinSelectionStep;
use App\Models\JoinSelectionStepPoint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class JoinController extends Controller
{
    public function edit(): View
    {
        $joinContent = JoinContent::query()->first();
        if (!$joinContent) {
            $joinContent = JoinContent::query()->create([]);
        }

        $formFields = JoinFormField::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $selectionSteps = JoinSelectionStep::query()
            ->with(['points' => function ($query) {
                $query->orderBy('sort_order')->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $salesContacts = JoinSalesContact::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $salesHighlights = JoinSalesHighlight::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.gabung.edit', [
            'joinContent' => $joinContent,
            'formFields' => $formFields,
            'selectionSteps' => $selectionSteps,
            'salesContacts' => $salesContacts,
            'salesHighlights' => $salesHighlights,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->joinContentRules(), [
            'hero_primary_button_link.regex' => 'Format link tombol utama hero tidak valid.',
            'hero_secondary_button_link.regex' => 'Format link tombol kedua hero tidak valid.',
            'cta_primary_button_link.regex' => 'Format link tombol utama CTA tidak valid.',
            'cta_secondary_button_link.regex' => 'Format link tombol kedua CTA tidak valid.',
        ]);

        $joinContent = JoinContent::query()->first();
        if (!$joinContent) {
            $joinContent = JoinContent::query()->create([]);
        }

        $joinContent->update($validated);

        return back()->with('success', 'Konten utama Gabung Mitra berhasil diperbarui.');
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

        JoinFormField::query()->create($validated);

        return back()->with('success', 'Field form berhasil ditambahkan.');
    }

    public function updateFormField(Request $request, int $id): RedirectResponse
    {
        $field = JoinFormField::query()->findOrFail($id);
        $validated = $request->validate($this->formFieldRules($field->id));
        $validated['is_required'] = $request->boolean('is_required');
        $validated['is_active'] = $request->boolean('is_active');

        $validated['options_json'] = $this->parseOptionsJson(
            $request->input('options_json_text'),
            $validated['field_type'] === 'select'
        );

        unset($validated['options_json_text']);

        $field->update($validated);

        return back()->with('success', 'Field form berhasil diperbarui.');
    }

    public function destroyFormField(int $id): RedirectResponse
    {
        $field = JoinFormField::query()->findOrFail($id);
        $field->delete();

        return back()->with('success', 'Field form berhasil dihapus.');
    }

    public function storeSelectionStep(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->selectionStepRules());
        $validated['is_active'] = $request->boolean('is_active');

        JoinSelectionStep::query()->create($validated);

        return back()->with('success', 'Step seleksi berhasil ditambahkan.');
    }

    public function updateSelectionStep(Request $request, int $id): RedirectResponse
    {
        $step = JoinSelectionStep::query()->findOrFail($id);
        $validated = $request->validate($this->selectionStepRules());
        $validated['is_active'] = $request->boolean('is_active');

        $step->update($validated);

        return back()->with('success', 'Step seleksi berhasil diperbarui.');
    }

    public function destroySelectionStep(int $id): RedirectResponse
    {
        $step = JoinSelectionStep::query()->findOrFail($id);
        $step->delete();

        return back()->with('success', 'Step seleksi berhasil dihapus.');
    }

    public function storeSelectionStepPoint(Request $request, int $id): RedirectResponse
    {
        $step = JoinSelectionStep::query()->findOrFail($id);
        $validated = $request->validate($this->selectionPointRules());
        $validated['join_selection_step_id'] = $step->id;
        $validated['is_active'] = $request->boolean('is_active');

        JoinSelectionStepPoint::query()->create($validated);

        return back()->with('success', 'Point step seleksi berhasil ditambahkan.');
    }

    public function updateSelectionStepPoint(Request $request, int $id): RedirectResponse
    {
        $point = JoinSelectionStepPoint::query()->findOrFail($id);
        $validated = $request->validate($this->selectionPointRules());
        $validated['is_active'] = $request->boolean('is_active');

        $point->update($validated);

        return back()->with('success', 'Point step seleksi berhasil diperbarui.');
    }

    public function destroySelectionStepPoint(int $id): RedirectResponse
    {
        $point = JoinSelectionStepPoint::query()->findOrFail($id);
        $point->delete();

        return back()->with('success', 'Point step seleksi berhasil dihapus.');
    }

    public function storeSalesContact(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->salesContactRules(), [
            'button_link.regex' => 'Format link tombol kontak tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        JoinSalesContact::query()->create($validated);

        return back()->with('success', 'Kontak sales berhasil ditambahkan.');
    }

    public function updateSalesContact(Request $request, int $id): RedirectResponse
    {
        $contact = JoinSalesContact::query()->findOrFail($id);
        $validated = $request->validate($this->salesContactRules(), [
            'button_link.regex' => 'Format link tombol kontak tidak valid.',
        ]);
        $validated['is_active'] = $request->boolean('is_active');

        $contact->update($validated);

        return back()->with('success', 'Kontak sales berhasil diperbarui.');
    }

    public function destroySalesContact(int $id): RedirectResponse
    {
        $contact = JoinSalesContact::query()->findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Kontak sales berhasil dihapus.');
    }

    public function storeSalesHighlight(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->salesHighlightRules());
        $validated['is_active'] = $request->boolean('is_active');

        JoinSalesHighlight::query()->create($validated);

        return back()->with('success', 'Highlight tambahan berhasil ditambahkan.');
    }

    public function updateSalesHighlight(Request $request, int $id): RedirectResponse
    {
        $highlight = JoinSalesHighlight::query()->findOrFail($id);
        $validated = $request->validate($this->salesHighlightRules());
        $validated['is_active'] = $request->boolean('is_active');

        $highlight->update($validated);

        return back()->with('success', 'Highlight tambahan berhasil diperbarui.');
    }

    public function destroySalesHighlight(int $id): RedirectResponse
    {
        $highlight = JoinSalesHighlight::query()->findOrFail($id);
        $highlight->delete();

        return back()->with('success', 'Highlight tambahan berhasil dihapus.');
    }

    private function joinContentRules(): array
    {
        return [
            'hero_badge_one' => ['nullable', 'string', 'max:255'],
            'hero_badge_two' => ['nullable', 'string', 'max:255'],
            'hero_badge_three' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string'],
            'hero_primary_button_text' => ['nullable', 'string', 'max:100'],
            'hero_primary_button_link' => $this->linkRules(),
            'hero_secondary_button_text' => ['nullable', 'string', 'max:100'],
            'hero_secondary_button_link' => $this->linkRules(),
            'registration_section_title' => ['required', 'string', 'max:255'],
            'registration_section_description' => ['required', 'string'],
            'registration_form_note' => ['nullable', 'string'],
            'selection_section_title' => ['required', 'string', 'max:255'],
            'selection_section_description' => ['nullable', 'string'],
            'sales_section_title' => ['required', 'string', 'max:255'],
            'sales_section_description' => ['required', 'string'],
            'cta_title' => ['required', 'string', 'max:255'],
            'cta_description' => ['required', 'string'],
            'cta_primary_button_text' => ['nullable', 'string', 'max:100'],
            'cta_primary_button_link' => $this->linkRules(),
            'cta_secondary_button_text' => ['nullable', 'string', 'max:100'],
            'cta_secondary_button_link' => $this->linkRules(),
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
                Rule::unique('join_form_fields', 'field_key')->ignore($id),
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

    private function selectionStepRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function selectionPointRules(): array
    {
        return [
            'point_text' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function salesContactRules(): array
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

    private function salesHighlightRules(): array
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
