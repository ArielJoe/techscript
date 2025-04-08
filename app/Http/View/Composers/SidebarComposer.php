<?php

namespace App\Http\View\Composers;

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $navItems = [];
        $userRole = null;

        if (Auth::check()) {
            try {
                $userRole = RoleEnum::from(Auth::user()->role)->label();
            } catch (\ValueError $e) {
                $userRole = null;
            }
        }

        if ($userRole) {
            $navItems[] = [
                'label' => 'Dashboard',
                'icon' => 'ri-dashboard-fill',
                'route' => "$userRole.index",
                'activeRoutes' => ["$userRole.index"],
            ];

            switch ($userRole) {
                case 'kaprodi':
                    $navItems[] = [
                        'label' => 'Submission',
                        'icon' => 'solar-letter-bold',
                        'route' => "$userRole.submission.index",
                        'activeRoutes' => ["$userRole.submission.index"],
                    ];
                    break;
                case 'mo':
                    $navItems[] = [
                        'label' => 'Submission',
                        'icon' => 'solar-letter-bold',
                        'route' => "$userRole.submission.index",
                        'activeRoutes' => ["$userRole.submission.index"],
                    ];
                    break;
                case 'mahasiswa':
                    $navItems[] = [
                        'label' => 'Letter',
                        'icon' => 'solar-letter-bold',
                        'route' => null,
                        'activeRoutes' => [
                            'mahasiswa.skma.index',
                            'mahasiswa.sptmk.index',
                            'mahasiswa.skl.index',
                            'mahasiswa.lhs.index',
                        ],
                        'children' => [
                            ['label' => 'SKMA', 'route' => 'mahasiswa.skma.index'],
                            ['label' => 'SPTMK', 'route' => 'mahasiswa.sptmk.index'],
                            ['label' => 'SKL', 'route' => 'mahasiswa.skl.index'],
                            ['label' => 'LHS', 'route' => 'mahasiswa.lhs.index'],
                        ],
                    ];
                    break;
                case 'admin':
                    $navItems[] = [
                        'label' => 'User',
                        'icon' => 'heroicon-s-user',
                        'route' => null,
                        'activeRoutes' => ['admin.kaprodi.index', 'admin.mo.index', 'admin.student.index'],
                        'children' => [
                            ['label' => 'Kaprodi', 'route' => 'admin.kaprodi.index'],
                            ['label' => 'MO', 'route' => 'admin.mo.index'],
                            ['label' => 'Mahasiswa', 'route' => 'admin.student.index'],
                        ],
                    ];
                    break;
            }

            foreach ($navItems as $index => $item) {
                if (!empty($item['children'])) {
                    $navItems[$index]['dropdownId'] = 'dropdown-' . Str::slug($item['label']) . '-' . $index;
                }
            }
        }

        $view->with('navItems', $navItems);
    }
}
