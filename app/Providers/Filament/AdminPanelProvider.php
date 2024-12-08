<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Firefly\FilamentBlog\Blog;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;

use Filament\Navigation\MenuItem;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;

class AdminPanelProvider extends PanelProvider
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => '#0A4FFC',
                'secondary' => '#0A89FC',
                'tertiary' => '#0A89FC',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->plugins([
                FilamentApexChartsPlugin::make()
            ])
            ->plugin(
                FilamentEditProfilePlugin::make()
                    ->slug('edit-profile') // Establece un slug para la ruta
                    ->setTitle('Editar Mi Perfil') // Cambia el título
                    ->setNavigationLabel('Perfil') // Cambia la etiqueta en la navegación
                    ->setIcon('heroicon-o-user') // Establece el icono
                    ->setSort(10)
                    ->shouldShowAvatarForm(
                        value: true,
                        directory: 'avatars', // Almacenará la imagen en 'storage/app/public/avatars'
                        rules: 'mimes:jpeg,png|max:5120' // Acepta solo archivos jpeg y png con un tamaño máximo de 5MB
                    )

            )
            ->userMenuItems([
                MenuItem::make()
                    ->label(fn() => auth()->user()->name) // Nombre del usuario
                    ->url(fn(): string => EditProfilePage::getUrl()) // URL para editar el perfil
                    ->icon('heroicon-m-user-circle') // Icono del menú
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->plugins([
                Blog::make()
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

    }
}
