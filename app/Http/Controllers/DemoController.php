<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Lessonmap;


class DemoController extends Controller
{
   public function index($lesson)
{
    $demos = [
        'metamask-demo' => [
            'view' => 'metamaskdemo',
            'required_progress' => 12,
        ],
        'placing-orders' => [
            'view' => 'ordersdemo',
            'required_progress' => 16,
        ],
    ];

    $progress = auth()->user()->lesson_progress;

    $demo = $demos[$lesson] ?? null;

    if (!$demo) abort(404);

    if ($progress < $demo['required_progress']) {
            abort(403, 'You have not unlocked this demo yet.');
        }

    return view('components.democenter.' . $demo['view']);
}


}
