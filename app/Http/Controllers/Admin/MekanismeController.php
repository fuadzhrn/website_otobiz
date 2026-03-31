<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MekanismeBusinessModel;
use App\Models\MekanismeBusinessModelPoint;
use App\Models\MekanismeContent;
use App\Models\MekanismeFaq;
use App\Models\MekanismeFlowStep;
use App\Models\MekanismeFlowStepPoint;
use App\Models\MekanismeTerm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MekanismeController extends Controller
{
    public function edit(): View
    {
        $content = MekanismeContent::query()->first();
        if (!$content) {
            $content = MekanismeContent::query()->create([]);
        }

        $businessModels = MekanismeBusinessModel::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $businessModelPoints = MekanismeBusinessModelPoint::query()
            ->whereIn('mekanisme_business_model_id', $businessModels->pluck('id'))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('mekanisme_business_model_id');

        $flowSteps = MekanismeFlowStep::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $flowStepPoints = MekanismeFlowStepPoint::query()
            ->whereIn('mekanisme_flow_step_id', $flowSteps->pluck('id'))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('mekanisme_flow_step_id');

        $terms = MekanismeTerm::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $faqs = MekanismeFaq::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.mekanisme.edit', [
            'content' => $content,
            'businessModels' => $businessModels,
            'businessModelPoints' => $businessModelPoints,
            'flowSteps' => $flowSteps,
            'flowStepPoints' => $flowStepPoints,
            'terms' => $terms,
            'faqs' => $faqs,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $content = MekanismeContent::query()->first();
        if (!$content) {
            $content = MekanismeContent::query()->create([]);
        }

        $validated = $request->validate($this->contentRules());
        $content->update($validated);

        return back()->with('success', 'Konten Mekanisme berhasil diperbarui.');
    }

    public function storeBusinessModel(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->businessModelRules());
        $validated['is_active'] = $request->boolean('is_active');

        MekanismeBusinessModel::query()->create($validated);

        return back()->with('success', 'Card model bisnis berhasil ditambahkan.');
    }

    public function updateBusinessModel(Request $request, int $id): RedirectResponse
    {
        $item = MekanismeBusinessModel::query()->findOrFail($id);

        $validated = $request->validate($this->businessModelRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Card model bisnis berhasil diperbarui.');
    }

    public function destroyBusinessModel(int $id): RedirectResponse
    {
        $item = MekanismeBusinessModel::query()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Card model bisnis berhasil dihapus.');
    }

    public function storeBusinessModelPoint(Request $request, int $id): RedirectResponse
    {
        MekanismeBusinessModel::query()->findOrFail($id);

        $validated = $request->validate($this->businessModelPointRules());
        $validated['mekanisme_business_model_id'] = $id;
        $validated['is_active'] = $request->boolean('is_active');

        MekanismeBusinessModelPoint::query()->create($validated);

        return back()->with('success', 'Point model bisnis berhasil ditambahkan.');
    }

    public function updateBusinessModelPoint(Request $request, int $id): RedirectResponse
    {
        $item = MekanismeBusinessModelPoint::query()->findOrFail($id);

        $validated = $request->validate($this->businessModelPointRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Point model bisnis berhasil diperbarui.');
    }

    public function destroyBusinessModelPoint(int $id): RedirectResponse
    {
        $item = MekanismeBusinessModelPoint::query()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Point model bisnis berhasil dihapus.');
    }

    public function storeFlowStep(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->flowStepRules());
        $validated['is_active'] = $request->boolean('is_active');

        MekanismeFlowStep::query()->create($validated);

        return back()->with('success', 'Langkah alur berhasil ditambahkan.');
    }

    public function updateFlowStep(Request $request, int $id): RedirectResponse
    {
        $item = MekanismeFlowStep::query()->findOrFail($id);

        $validated = $request->validate($this->flowStepRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Langkah alur berhasil diperbarui.');
    }

    public function destroyFlowStep(int $id): RedirectResponse
    {
        $item = MekanismeFlowStep::query()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Langkah alur berhasil dihapus.');
    }

    public function storeFlowStepPoint(Request $request, int $id): RedirectResponse
    {
        MekanismeFlowStep::query()->findOrFail($id);

        $validated = $request->validate($this->flowStepPointRules());
        $validated['mekanisme_flow_step_id'] = $id;
        $validated['is_active'] = $request->boolean('is_active');

        MekanismeFlowStepPoint::query()->create($validated);

        return back()->with('success', 'Point langkah alur berhasil ditambahkan.');
    }

    public function updateFlowStepPoint(Request $request, int $id): RedirectResponse
    {
        $item = MekanismeFlowStepPoint::query()->findOrFail($id);

        $validated = $request->validate($this->flowStepPointRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Point langkah alur berhasil diperbarui.');
    }

    public function destroyFlowStepPoint(int $id): RedirectResponse
    {
        $item = MekanismeFlowStepPoint::query()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Point langkah alur berhasil dihapus.');
    }

    public function storeTerm(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->termRules());
        $validated['is_active'] = $request->boolean('is_active');

        MekanismeTerm::query()->create($validated);

        return back()->with('success', 'Syarat & ketentuan berhasil ditambahkan.');
    }

    public function updateTerm(Request $request, int $id): RedirectResponse
    {
        $item = MekanismeTerm::query()->findOrFail($id);

        $validated = $request->validate($this->termRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Syarat & ketentuan berhasil diperbarui.');
    }

    public function destroyTerm(int $id): RedirectResponse
    {
        $item = MekanismeTerm::query()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'Syarat & ketentuan berhasil dihapus.');
    }

    public function storeFaq(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->faqRules());
        $validated['is_active'] = $request->boolean('is_active');

        MekanismeFaq::query()->create($validated);

        return back()->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function updateFaq(Request $request, int $id): RedirectResponse
    {
        $item = MekanismeFaq::query()->findOrFail($id);

        $validated = $request->validate($this->faqRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroyFaq(int $id): RedirectResponse
    {
        $item = MekanismeFaq::query()->findOrFail($id);
        $item->delete();

        return back()->with('success', 'FAQ berhasil dihapus.');
    }

    private function contentRules(): array
    {
        return [
            'hero_badge_one' => ['nullable', 'string', 'max:255'],
            'hero_badge_two' => ['nullable', 'string', 'max:255'],
            'hero_badge_three' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string'],
            'hero_primary_button_text' => ['nullable', 'string', 'max:255'],
            'hero_primary_button_link' => $this->linkRules(),
            'hero_secondary_button_text' => ['nullable', 'string', 'max:255'],
            'hero_secondary_button_link' => $this->linkRules(),
            'business_section_title' => ['nullable', 'string', 'max:255'],
            'flow_section_title' => ['nullable', 'string', 'max:255'],
            'flow_note_text' => ['nullable', 'string'],
            'terms_section_title' => ['nullable', 'string', 'max:255'],
            'faq_section_title' => ['nullable', 'string', 'max:255'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_description' => ['nullable', 'string'],
            'cta_primary_button_text' => ['nullable', 'string', 'max:255'],
            'cta_primary_button_link' => $this->linkRules(),
            'cta_secondary_button_text' => ['nullable', 'string', 'max:255'],
            'cta_secondary_button_link' => $this->linkRules(),
            'cta_third_button_text' => ['nullable', 'string', 'max:255'],
            'cta_third_button_link' => $this->linkRules(),
        ];
    }

    private function businessModelRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'item_type' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function businessModelPointRules(): array
    {
        return [
            'point_text' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function flowStepRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function flowStepPointRules(): array
    {
        return [
            'point_text' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function termRules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function faqRules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function linkRules(): array
    {
        return [
            'nullable',
            'string',
            'max:255',
            function (string $attribute, mixed $value, \Closure $fail): void {
                if ($value === null || $value === '') {
                    return;
                }

                if (!preg_match('/^(https?:\/\/|\/|#|mailto:|tel:)/', (string) $value)) {
                    $fail('Format link pada ' . $attribute . ' tidak valid. Gunakan URL, path "/...", atau anchor "#...".');
                }
            },
        ];
    }
}
