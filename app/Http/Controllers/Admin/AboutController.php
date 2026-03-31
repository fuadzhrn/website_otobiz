<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use App\Models\AboutMission;
use App\Models\AboutValue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function edit(): View
    {
        $aboutContent = AboutContent::query()->first();

        if (!$aboutContent) {
            $aboutContent = AboutContent::query()->create([]);
        }

        $missions = AboutMission::query()->orderBy('sort_order')->get();
        $values = AboutValue::query()->orderBy('sort_order')->get();

        return view('admin.tentang.edit', [
            'aboutContent' => $aboutContent,
            'missions' => $missions,
            'values' => $values,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $formSection = $request->input('form_section');

        if (!in_array($formSection, ['intro', 'vision', 'values_header'], true)) {
            return back()->withErrors(['form_section' => 'Section update tidak valid.']);
        }

        $aboutContent = AboutContent::query()->first();
        if (!$aboutContent) {
            $aboutContent = AboutContent::query()->create([]);
        }

        if ($formSection === 'intro') {
            $validated = $request->validate([
                'intro_section_title' => ['required', 'string', 'max:255'],
                'intro_description' => ['required', 'string'],
            ]);

            $aboutContent->update($validated);

            return back()->with('success', 'Konten intro berhasil diperbarui.');
        }

        if ($formSection === 'vision') {
            $validated = $request->validate([
                'vision_section_title' => ['required', 'string', 'max:255'],
                'vision_title' => ['required', 'string', 'max:255'],
                'vision_description' => ['required', 'string'],
                'mission_section_title' => ['required', 'string', 'max:255'],
            ]);

            $aboutContent->update($validated);

            return back()->with('success', 'Visi berhasil diperbarui.');
        }

        $validated = $request->validate([
            'values_section_title' => ['required', 'string', 'max:255'],
            'values_section_description' => ['required', 'string'],
        ]);

        $aboutContent->update($validated);

        return back()->with('success', 'Nilai bisnis berhasil diperbarui.');
    }

    public function storeMission(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->missionRules());
        $validated['is_active'] = $request->boolean('is_active');

        AboutMission::query()->create($validated);

        return back()->with('success', 'Item misi berhasil ditambahkan.');
    }

    public function updateMission(Request $request, AboutMission $item): RedirectResponse
    {
        $validated = $request->validate($this->missionRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Item misi berhasil diperbarui.');
    }

    public function destroyMission(AboutMission $item): RedirectResponse
    {
        $item->delete();

        return back()->with('success', 'Item misi berhasil dihapus.');
    }

    public function storeValue(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->valueRules());
        $validated['is_active'] = $request->boolean('is_active');

        AboutValue::query()->create($validated);

        return back()->with('success', 'Item nilai berhasil ditambahkan.');
    }

    public function updateValue(Request $request, AboutValue $item): RedirectResponse
    {
        $validated = $request->validate($this->valueRules());
        $validated['is_active'] = $request->boolean('is_active');

        $item->update($validated);

        return back()->with('success', 'Item nilai berhasil diperbarui.');
    }

    public function destroyValue(AboutValue $item): RedirectResponse
    {
        $item->delete();

        return back()->with('success', 'Item nilai berhasil dihapus.');
    }

    private function missionRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function valueRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
