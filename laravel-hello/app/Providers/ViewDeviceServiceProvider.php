<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\View\FileViewFinder;
use Illuminate\Support\Facades\App;
use Illuminate\View\View as ViewObject;

class ViewDeviceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        View::composer('*', function (ViewObject $view) {
            $originalView = $view->getName(); // 例: 'users.index'
            $device = $this->detectDevice(); // 'sp' or 'pc'

            if ($device === 'sp') {
                $spView = 'sp.' . $originalView;

                if (View::exists($spView)) {
                    /** @var FileViewFinder $finder */
                    $finder = App::make('view.finder');
                    $path = $finder->find($spView);

                    // テンプレートの実ファイルパスに差し替え
                    $view->setPath($path);
                }
            }
        });
    }

    private function detectDevice(): string
    {
        $ua = request()->header('User-Agent');

        if (strpos($ua, 'iPhone') !== false || strpos($ua, 'Android') !== false) {
            return 'sp';
        }

        return 'pc';
    }
}
