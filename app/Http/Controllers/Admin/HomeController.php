<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\HomeStat;
use App\Models\HomeSummaryStep;
use App\Models\HomeValueItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function edit(): View
    {
        $homeContent = HomeContent::query()->first();

        if (!$homeContent) {
            $homeContent = HomeContent::query()->create([]);
        }

        $valueItems = HomeValueItem::query()->orderBy('sort_order')->get();
        $summarySteps = HomeSummaryStep::query()->orderBy('sort_order')->get();
        $stats = HomeStat::query()->orderBy('sort_order')->get();

        return view('admin.home.edit', [
            'homeContent' => $homeContent,
            'valueItems' => $valueItems,
            'summarySteps' => $summarySteps,
            'stats' => $stats,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'hero_badge_text' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_hero_image' => ['nullable', 'boolean'],
            'hero_primary_button_text' => ['required', 'string', 'max:100'],
            'hero_primary_button_link' => $this->linkRules(),
            'hero_secondary_button_text' => ['required', 'string', 'max:100'],
            'hero_secondary_button_link' => $this->linkRules(),
            'value_section_title' => ['required', 'string', 'max:255'],
            'value_section_description' => ['nullable', 'string'],
            'summary_section_title' => ['required', 'string', 'max:255'],
            'summary_section_description' => ['nullable', 'string'],
            'stats_section_title' => ['required', 'string', 'max:255'],
            'stats_section_description' => ['nullable', 'string'],
            'cta_title' => ['required', 'string', 'max:255'],
            'cta_description' => ['required', 'string'],
            'cta_button_text' => ['required', 'string', 'max:100'],
            'cta_button_link' => $this->linkRules(),
        ], [
            'hero_image.image' => 'File hero image harus berupa gambar.',
            'hero_image.mimes' => 'Format hero image harus jpg, jpeg, png, atau webp.',
            'hero_image.max' => 'Ukuran hero image maksimal 4MB.',
            'hero_primary_button_link.regex' => 'Format link tombol utama tidak valid.',
            'hero_secondary_button_link.regex' => 'Format link tombol kedua tidak valid.',
            'cta_button_link.regex' => 'Format link tombol CTA tidak valid.',
        ]);

        $homeContent = HomeContent::query()->first();

        if (!$homeContent) {
            $homeContent = HomeContent::query()->create([]);
        }

        $updateData = $validated;
        unset($updateData['hero_image'], $updateData['remove_hero_image']);

        if ($request->boolean('remove_hero_image') && !empty($homeContent->hero_image) && !Str::startsWith($homeContent->hero_image, ['http://', 'https://', '/'])) {
            Storage::disk('public')->delete($homeContent->hero_image);
            $updateData['hero_image'] = null;
        }

        if ($request->hasFile('hero_image')) {
            if (!empty($homeContent->hero_image) && !Str::startsWith($homeContent->hero_image, ['http://', 'https://', '/'])) {
                Storage::disk('public')->delete($homeContent->hero_image);
            }

            $updateData['hero_image'] = $request->file('hero_image')->store('home/hero', 'public');
        }

        $homeContent->update($updateData);

        return back()->with('success', 'Konten Home berhasil diperbarui.');
    }

    public function storeValueItem(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->valueItemRules());
        $validated['is_active'] = $request->boolean('is_active');

        HomeValueItem::query()->create($validated);

        return back()->with('success', 'Item value proposition berhasil ditambahkan.');
    }

    public function updateValueItem(Request $request, HomeValueItem $item): RedirectResponse
    {
        $validated = $request->validate($this->valueItemRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Item value proposition berhasil diperbarui.');
    }

    public function destroyValueItem(HomeValueItem $item): RedirectResponse
    {
        $item->delete();

        return back()->with('success', 'Item value proposition berhasil dihapus.');
    }

    public function storeSummaryStep(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->summaryStepRules());
        $validated['is_active'] = $request->boolean('is_active');

        HomeSummaryStep::query()->create($validated);

        return back()->with('success', 'Step ringkasan kemitraan berhasil ditambahkan.');
    }

    public function updateSummaryStep(Request $request, HomeSummaryStep $item): RedirectResponse
    {
        $validated = $request->validate($this->summaryStepRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Step ringkasan kemitraan berhasil diperbarui.');
    }

    public function destroySummaryStep(HomeSummaryStep $item): RedirectResponse
    {
        $item->delete();

        return back()->with('success', 'Step ringkasan kemitraan berhasil dihapus.');
    }

    public function storeStat(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->statRules());
        $validated['is_active'] = $request->boolean('is_active');

        HomeStat::query()->create($validated);

        return back()->with('success', 'Item statistik berhasil ditambahkan.');
    }

    public function updateStat(Request $request, HomeStat $item): RedirectResponse
    {
        $validated = $request->validate($this->statRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Item statistik berhasil diperbarui.');
    }

    public function destroyStat(HomeStat $item): RedirectResponse
    {
        $item->delete();

        return back()->with('success', 'Item statistik berhasil dihapus.');
    }

    private function linkRules(): array
    {
        return [
            'required',
            'string',
            'max:255',
            'regex:/^(#[-A-Za-z0-9_]+|\/[\S]*|https?:\/\/[\S]+)$/',
        ];
    }

    private function valueItemRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function summaryStepRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function statRules(): array
    {
        return [
            'number' => ['required', 'string', 'max:100'],
            'label' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
