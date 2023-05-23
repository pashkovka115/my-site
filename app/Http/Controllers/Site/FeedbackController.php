<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use App\Models\Feedback\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends SiteController
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'description' => 'string|required',
        ]);

        try {
            $message = new Feedback($data);
            $res = $message->save();

            /*if ($res) {
                return 'Сообщение сохранено';
            }*/
        } catch (\Exception $e) {
            return 'Ошибка передачи данных. Попробуйте обновить страницу и отправить сообщение ещё раз. ( '
                . $e->getMessage() . ' )';
        }

        return back()->with('success', 'Сообщение сохранено.');
    }
}
