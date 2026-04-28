<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductContent;
use App\Models\ProductPackage;
use App\Models\ProductPackageBenefit;
use App\Models\ProductSimulationContent;
use App\Models\ProductSimulationHighlight;
use App\Models\ProductUnit;
use App\Models\ProductUnitGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function edit(): View
    {
        $productContent = ProductContent::query()->first();
        if (!$productContent) {
            $productContent = ProductContent::query()->create([]);
        }

        $simulationContent = ProductSimulationContent::query()->first();
        if (!$simulationContent) {
            $simulationContent = ProductSimulationContent::query()->create([]);
        }

        $units = ProductUnit::query()
            ->with(['galleries' => function ($query) {
                $query->orderBy('sort_order')->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $activeUnits = ProductUnit::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name']);

        $packages = ProductPackage::query()
            ->with([
                'unit:id,name',
                'benefits' => function ($query) {
                    $query->orderBy('sort_order')->orderBy('id');
                },
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $simulationHighlights = ProductSimulationHighlight::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.produk.edit', [
            'productContent' => $productContent,
            'simulationContent' => $simulationContent,
            'units' => $units,
            'activeUnits' => $activeUnits,
            'packages' => $packages,
            'simulationHighlights' => $simulationHighlights,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $formSection = $request->input('form_section');

        if ($formSection === 'main_content') {
            $validated = $request->validate($this->productContentRules(), [
                'hero_image.image' => 'File hero image harus berupa gambar.',
                'hero_image.mimes' => 'Format hero image harus jpg, jpeg, png, atau webp.',
                'hero_image.max' => 'Ukuran hero image maksimal 4MB.',
                'hero_primary_button_link.regex' => 'Format link tombol utama tidak valid.',
                'hero_secondary_button_link.regex' => 'Format link tombol kedua tidak valid.',
                'cta_primary_button_link.regex' => 'Format link CTA utama tidak valid.',
                'cta_secondary_button_link.regex' => 'Format link CTA kedua tidak valid.',
                'cta_third_button_link.regex' => 'Format link CTA ketiga tidak valid.',
            ]);

            $content = ProductContent::query()->first();
            if (!$content) {
                $content = ProductContent::query()->create([]);
            }

            $updateData = $validated;
            unset($updateData['hero_image'], $updateData['remove_hero_image']);

            if ($request->boolean('remove_hero_image') && !empty($content->hero_image) && !Str::startsWith($content->hero_image, ['http://', 'https://', '/'])) {
                Storage::disk('public')->delete($content->hero_image);
                $updateData['hero_image'] = null;
            }

            if ($request->hasFile('hero_image')) {
                if (!empty($content->hero_image) && !Str::startsWith($content->hero_image, ['http://', 'https://', '/'])) {
                    Storage::disk('public')->delete($content->hero_image);
                }

                $updateData['hero_image'] = $request->file('hero_image')->store('products/hero', 'public');
            }

            $content->update($updateData);

            return back()->with('success', 'Konten utama Produk berhasil diperbarui.');
        }

        if ($formSection === 'simulation_content') {
            $validated = $request->validate($this->simulationContentRules());

            $simulation = ProductSimulationContent::query()->first();
            if (!$simulation) {
                $simulation = ProductSimulationContent::query()->create([]);
            }

            $simulation->update($validated);

            return back()->with('success', 'Konten simulasi berhasil diperbarui.');
        }

        return back()->withErrors(['form_section' => 'Section update tidak valid.']);
    }

    public function storeUnit(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->unitRules(true));

        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('products/units/main', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        ProductUnit::query()->create($validated);

        return back()->with('success', 'Unit kendaraan berhasil ditambahkan.');
    }

    public function updateUnit(Request $request, int $id): RedirectResponse
    {
        $unit = ProductUnit::query()->findOrFail($id);
        $validated = $request->validate($this->unitRules(false));

        if ($request->hasFile('main_image')) {
            $newPath = $request->file('main_image')->store('products/units/main', 'public');
            $this->deleteStoredImage($unit->main_image);
            $validated['main_image'] = $newPath;
        }

        $validated['is_active'] = $request->boolean('is_active');

        $unit->update($validated);

        return back()->with('success', 'Unit kendaraan berhasil diperbarui.');
    }

    public function destroyUnit(int $id): RedirectResponse
    {
        $unit = ProductUnit::query()->with('galleries')->findOrFail($id);

        foreach ($unit->galleries as $gallery) {
            $this->deleteStoredImage($gallery->image_path);
        }

        $this->deleteStoredImage($unit->main_image);
        $unit->delete();

        return back()->with('success', 'Unit kendaraan berhasil dihapus.');
    }

    public function toggleUnit(int $id): RedirectResponse
    {
        $unit = ProductUnit::query()->findOrFail($id);
        $unit->update(['is_active' => ! $unit->is_active]);

        return back()->with('success', 'Status unit kendaraan berhasil diperbarui.');
    }

    public function storeGallery(Request $request, int $id): RedirectResponse
    {
        $unit = ProductUnit::query()->findOrFail($id);
        $validated = $request->validate($this->galleryRules(true));
        $validated['product_unit_id'] = $unit->id;
        $validated['is_active'] = $request->boolean('is_active');
        $validated['image_path'] = $request->file('image_file')->store('products/units/galleries', 'public');

        ProductUnitGallery::query()->create($validated);

        return back()->with('success', 'Galeri unit berhasil ditambahkan.');
    }

    public function updateGallery(Request $request, int $id): RedirectResponse
    {
        $gallery = ProductUnitGallery::query()->findOrFail($id);
        $validated = $request->validate($this->galleryRules(false));

        if ($request->hasFile('image_file')) {
            $newPath = $request->file('image_file')->store('products/units/galleries', 'public');
            $this->deleteStoredImage($gallery->image_path);
            $validated['image_path'] = $newPath;
        }

        $validated['is_active'] = $request->boolean('is_active');

        $gallery->update($validated);

        return back()->with('success', 'Galeri unit berhasil diperbarui.');
    }

    public function destroyGallery(int $id): RedirectResponse
    {
        $gallery = ProductUnitGallery::query()->findOrFail($id);
        $this->deleteStoredImage($gallery->image_path);
        $gallery->delete();

        return back()->with('success', 'Galeri unit berhasil dihapus.');
    }

    public function toggleGallery(int $id): RedirectResponse
    {
        $gallery = ProductUnitGallery::query()->findOrFail($id);
        $gallery->update(['is_active' => ! $gallery->is_active]);

        return back()->with('success', 'Status galeri unit berhasil diperbarui.');
    }

    public function storePackage(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->packageRules());
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_popular'] = $request->boolean('is_popular');

        ProductPackage::query()->create($validated);

        return back()->with('success', 'Paket kemitraan berhasil ditambahkan.');
    }

    public function updatePackage(Request $request, int $id): RedirectResponse
    {
        $package = ProductPackage::query()->findOrFail($id);
        $validated = $request->validate($this->packageRules());
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_popular'] = $request->boolean('is_popular');

        $package->update($validated);

        return back()->with('success', 'Paket kemitraan berhasil diperbarui.');
    }

    public function destroyPackage(int $id): RedirectResponse
    {
        $package = ProductPackage::query()->findOrFail($id);
        $package->delete();

        return back()->with('success', 'Paket kemitraan berhasil dihapus.');
    }

    public function togglePackage(int $id): RedirectResponse
    {
        $package = ProductPackage::query()->findOrFail($id);
        $package->update(['is_active' => ! $package->is_active]);

        return back()->with('success', 'Status paket kemitraan berhasil diperbarui.');
    }

    public function storeBenefit(Request $request, int $id): RedirectResponse
    {
        $package = ProductPackage::query()->findOrFail($id);
        $validated = $request->validate($this->benefitRules());
        $validated['is_active'] = $request->boolean('is_active');
        $validated['product_package_id'] = $package->id;

        ProductPackageBenefit::query()->create($validated);

        return back()->with('success', 'Benefit paket berhasil ditambahkan.');
    }

    public function updateBenefit(Request $request, int $id): RedirectResponse
    {
        $benefit = ProductPackageBenefit::query()->findOrFail($id);
        $validated = $request->validate($this->benefitRules());
        $validated['is_active'] = $request->boolean('is_active');

        $benefit->update($validated);

        return back()->with('success', 'Benefit paket berhasil diperbarui.');
    }

    public function destroyBenefit(int $id): RedirectResponse
    {
        $benefit = ProductPackageBenefit::query()->findOrFail($id);
        $benefit->delete();

        return back()->with('success', 'Benefit paket berhasil dihapus.');
    }

    public function storeSimulationHighlight(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->simulationHighlightRules());
        $validated['is_active'] = $request->boolean('is_active');

        ProductSimulationHighlight::query()->create($validated);

        return back()->with('success', 'Highlight simulasi berhasil ditambahkan.');
    }

    public function updateSimulationHighlight(Request $request, int $id): RedirectResponse
    {
        $highlight = ProductSimulationHighlight::query()->findOrFail($id);
        $validated = $request->validate($this->simulationHighlightRules());
        $validated['is_active'] = $request->boolean('is_active');

        $highlight->update($validated);

        return back()->with('success', 'Highlight simulasi berhasil diperbarui.');
    }

    public function destroySimulationHighlight(int $id): RedirectResponse
    {
        $highlight = ProductSimulationHighlight::query()->findOrFail($id);
        $highlight->delete();

        return back()->with('success', 'Highlight simulasi berhasil dihapus.');
    }

    private function productContentRules(): array
    {
        return [
            'hero_badge_text' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_hero_image' => ['nullable', 'boolean'],
            'hero_primary_button_text' => ['nullable', 'string', 'max:100'],
            'hero_primary_button_link' => $this->linkRules(),
            'hero_secondary_button_text' => ['nullable', 'string', 'max:100'],
            'hero_secondary_button_link' => $this->linkRules(),
            'packages_section_title' => ['required', 'string', 'max:255'],
            'packages_section_note' => ['nullable', 'string'],
            'units_section_title' => ['required', 'string', 'max:255'],
            'specs_section_title' => ['required', 'string', 'max:255'],
            'simulation_section_title' => ['required', 'string', 'max:255'],
            'simulation_disclaimer' => ['nullable', 'string'],
            'cta_title' => ['required', 'string', 'max:255'],
            'cta_description' => ['required', 'string'],
            'cta_primary_button_text' => ['nullable', 'string', 'max:100'],
            'cta_primary_button_link' => $this->linkRules(),
            'cta_secondary_button_text' => ['nullable', 'string', 'max:100'],
            'cta_secondary_button_link' => $this->linkRules(),
            'cta_third_button_text' => ['nullable', 'string', 'max:100'],
            'cta_third_button_link' => $this->linkRules(),
        ];
    }

    private function simulationContentRules(): array
    {
        return [
            'intro_text' => ['nullable', 'string'],
            'daily_deposit_label' => ['required', 'string', 'max:255'],
            'operating_days_label' => ['required', 'string', 'max:255'],
            'operating_cost_label' => ['required', 'string', 'max:255'],
            'installment_label' => ['required', 'string', 'max:255'],
            'result_total_operational_label' => ['required', 'string', 'max:255'],
            'result_net_profit_label' => ['required', 'string', 'max:255'],
            'result_partner_share_label' => ['required', 'string', 'max:255'],
            'result_otobiz_share_label' => ['required', 'string', 'max:255'],
            'partner_share_percentage' => ['required', 'integer', 'min:0', 'max:100'],
            'otobiz_share_percentage' => ['required', 'integer', 'min:0', 'max:100'],
        ];
    }

    private function unitRules(bool $isCreate): array
    {
        $imageRules = ['nullable', 'image', 'max:4096'];
        if ($isCreate) {
            $imageRules = ['required', 'image', 'max:4096'];
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'unit_type' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'string', 'max:100'],
            'short_description' => ['nullable', 'string'],
            'energy_type' => ['nullable', 'string', 'max:100'],
            'capacity' => ['nullable', 'string', 'max:255'],
            'operational_use' => ['nullable', 'string', 'max:255'],
            'main_advantages' => ['nullable', 'string'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'main_image' => $imageRules,
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function galleryRules(bool $isCreate): array
    {
        $imageRules = ['nullable', 'image', 'max:4096'];
        if ($isCreate) {
            $imageRules = ['required', 'image', 'max:4096'];
        }

        return [
            'image_file' => $imageRules,
            'alt_text' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function packageRules(): array
    {
        return [
            'product_unit_id' => [
                'required',
                'integer',
                Rule::exists('product_units', 'id')->where(function ($query) {
                    $query->where('is_active', true);
                }),
            ],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'is_popular' => ['nullable', 'boolean'],
            'partnership_price' => ['nullable', 'string', 'max:100'],
            'starting_price' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'cta_text' => ['nullable', 'string', 'max:100'],
            'cta_link' => $this->linkRules(),
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function benefitRules(): array
    {
        return [
            'benefit_text' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    private function simulationHighlightRules(): array
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
            'regex:/^(#(?:[A-Za-z0-9\-_:.]+)?|\/[A-Za-z0-9\-._~\/]*|https?:\/\/[^\s]+)$/',
        ];
    }

    private function deleteStoredImage(?string $path): void
    {
        if (!$path || !$this->isStoredPath($path)) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function isStoredPath(string $path): bool
    {
        return !Str::startsWith($path, ['http://', 'https://', '/']);
    }
}
