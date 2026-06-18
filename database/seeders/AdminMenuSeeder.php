<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OpenAdmin\Admin\Auth\Database\Menu;

class AdminMenuSeeder extends Seeder
{
    public function run(): void
    {
        $this->createMenu('Dashboard', 'fa-dashboard', '/admin', 1);
        $this->createMenu('Content', 'icon-file', '/content', 2);
        $this->createMenu('Video', 'icon-video', '/video', 3);
        $this->createMenu('Categories', 'icon-archive', '/category', 4);
    }

    private function createMenu(string $title, string $icon, string $uri, int $order): Menu
    {
        return Menu::firstOrCreate(
            ['title' => $title],
            [
                'icon' => $icon,
                'uri' => $uri,
                'order' => $order,
                'parent_id' => 0,
            ]
        );
    }
}
