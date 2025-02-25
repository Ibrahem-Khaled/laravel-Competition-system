<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function selectRamadanUsers()
    {
        return view('select-ramadan-users');
    }

    // جلب مستخدم عشوائي
    public function getRandomUser()
    {
        // جلب مستخدم عشوائي من قاعدة البيانات
        $randomUser = User::inRandomOrder()->first();

        // إذا لم يتم العثور على مستخدم
        if (!$randomUser) {
            return response()->json([
                'success' => false,
                'message' => 'لا يوجد مستخدمين متاحين.'
            ], 404);
        }

        // إرجاع بيانات المستخدم
        return response()->json([
            'success' => true,
            'user' => [
                'id' => $randomUser->id,
                'name' => $randomUser->name,
                'email' => $randomUser->email,
                'phone' => $randomUser->formatted_phone, // إذا كنت تستخدم Accessor لتنسيق رقم الهاتف
                'avatar' => $randomUser->avatar_url // إذا كنت تستخدم Accessor لعرض الصورة
            ]
        ]);
    }

    public function questions(User $user)
    {
        $questions = Question::all();
        return view('questions', compact('questions', 'user'));
    }
}
