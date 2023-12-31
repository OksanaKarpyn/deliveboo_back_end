<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Admin\Typology;
use App\Models\Admin\Restaurant;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Typology::All();

        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'activity_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'piva' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $form_data = $request->all();
        if($request->hasFile('photo')){
            $path_img = Storage::disk('public')->put('folderPhoto', $request->photo);
            $form_data['photo'] = $path_img;
            // dd($path_img);
            
        }else{
            $form_data['photo'] = 'https://picsum.photos/200/200';
        }

        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->activity_name,
            'address' => $request->address,
            'piva' => $request->piva,
            'photo' => $form_data['photo'], 
        ]);

        if ($request['typologies']){
            $typologies = $request->input('typologies');
            $restaurant->typologies()->attach($typologies);

        }
      
        event(new Registered($user, $restaurant));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}