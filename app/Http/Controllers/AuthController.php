<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function registro()
    {
        return view("auth.register");
    }
    public function login()
    {
        return view("auth.login");
    }
    public function registrar(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'rol' => 'required'
            ]);

            $prohibitedWords = [
                'ofensiva',
                'grosera',
                'puto',
                'puta',
                'verga',
                'zorra',
                'pendejo',
                'pendeja',
                'pene',
                'sexo',
                'nazi',
                'pela',
                'pelas',
                'mierda',
                'caca',
                'kaka',
                'popo',
                'pendejos',
                'putos',
                'putas',
                'ramera',
                'Puto',
                'Puta',
                'Pendejo',
                'Pendeja',
                'Pendejos',
                'Putos',
                'Verga',
                'Pene',
                'cabron',
                'cabrona',
                'cabrones',
                'chingada',
                'chingado',
                'chingados',
                'chingar',
                'chingona',
                'chingon',
                'culero',
                'culera',
                'culeros',
                'cojones',
                'coño',
                'coger',
                'joder',
                'gilipollas',
                'marica',
                'maricon',
                'maricona',
                'maricones',
                'mierdero',
                'mamada',
                'mamado',
                'mamadas',
                'nalgas',
                'perra',
                'perras',
                'putazo',
                'putazos',
                'rata',
                'raton',
                'malparido',
                'malnacido',
                'soplapollas',
                'tetas',
                'teta',
                'tetonas',
                'teton',
                'vagina',
                'vergas',
                'vergudo',
                'guey',
                'wey',
                'huevon',
                'huevona',
                'huevones',
                'pajero',
                'pajeros',
                'pajera',
                'pajeras',
                'chupapijas',
                'chupapollas',
                'culos',
                'tragasables',
                'come mierda',
                'come caca',
                'tragasemen',
                'tragaleche',
                'culia',
                'culiado',
                'culiada',
                'culiad@',
                'chupamela',
                'chupame',
                'marrano',
                'marrana',
                'marranos',
                'cojudo',
                'cojuda',
                'cojudos',
                'baboso',
                'babosa',
                'babosos',
                'estupido',
                'estupida',
                'idiota',
                'imbecil',
                'tarado',
                'tarada',
                'mongolico',
                'mongolica',
                'mongolitos',
                'mongoles',
                'subnormal',
                'anormal',
                'debil mental',
                'enfermo',
                'psicopata',
                'desquiciado',
                'loca',
                'loco',
                'locos',
                'demente',
                'bastardo',
                'bastarda',
                'hijo de puta',
                'hijo de perra',
                'pervertido',
                'pervertida',
                'pervertidos',
                'sucio',
                'sucia',
                'degenerado',
                'degenerada',
                'asqueroso',
                'asquerosa',
                'repugnante',
                'cerdo',
                'cerda',
                'cerdos',
                'zorrillo',
                'zorrilla',
                'putero',
                'puteros',
                'pornografico',
                'pornografia',
                'sodomita',
                'maldito',
                'maldita',
                'malditos',
                'satanico',
                'satanista',
                'demonio',
                'diablo',
                'inmundo',
                'escoria',
                'basura',
                'paria',
                'desgraciado',
                'desgraciada',
                'malnacido',
                'malnacida',
                'forro',
                'forra',
                'forros',
                'pajearse',
                'pajero',
                'pajeros',
                'pajera',
                'pajeras',
                'sorete',
                'gil',
                'hijueputa',
                'hijueputas',
                'huevon',
                'huevona',
                'huevones',
                'atontado',
                'atontada',
                'tarugo',
                'taruga',
                'nazi',
                'facha',
                'racista',
                'xenofobo',
                'homofobo',
                'machista',
                'misogino',
                'misogina',
                'culona',
                'Culona',
                'geys',
                'Gey',
            ];

            function normalizeText($text)
            {
                $text = strtolower($text); // Convertir a minúsculas
                $text = str_replace(
                    ['@', '4', '3', '$', '0', '1', '!', '|', '€', '£', '¢', '§'],
                    ['a', 'a', 'e', 's', 'o', 'i', 'i', 'i', 'e', 'l', 'c', 's'],
                    $text
                ); // Sustitución de caracteres
                $text = preg_replace('/[^a-z]/', '', $text); // Eliminar caracteres especiales
                return $text;
            }

            $normalizedName = normalizeText($request->name);

            foreach ($prohibitedWords as $word) {
                if (stripos($normalizedName, normalizeText($word)) !== false) {
                    return back()->with('error', 'El nombre de usuario contiene palabras no permitidas.');
                }
            }


            $roles = ['alumno' => 1, 'docente' => 2, 'administrador' => 3];
            $rolN = $roles[$request->rol] ?? 4;

            $item = new User();
            $item->name = $request->name;
            $item->email = $request->email;
            $item->password = Hash::make($request->password);
            $item->roles_id_roles = $rolN;
            $item->save();


            Auth::login($item);

            return redirect()->route('login')->with('success', 'Registro exitoso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error en el registro: El correo electronico ya esta registrado con una cuenta, ' . $e->getMessage());
        }
    }

    public function logear(Request $request)
    {
        try {
            $creadenciales = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if (Auth::attempt($creadenciales)) {
                return redirect()->route('home')->with('success', 'Inicio de sesión exitoso!');
            }
            return back()->with('error', 'Correo electronico y/o contraseña incorrecta.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al iniciar sesión: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('home');
    }

    // socualite 
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName(),
                    'email' => $facebookUser->getEmail(),
                    'avatar' => $facebookUser->getAvatar(),
                    'roles_id_roles' => 1,
                ]
            );

            // Autentica al usuario
            Auth::login($user);

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error al iniciar sesión con Facebook.');
        }
    }


    // Redirección a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback de Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Busca o crea el usuario
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'roles_id_roles' => 1,
            ]
        );

        // Autentica al usuario
        Auth::login($user);

        return redirect()->route('home');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $prohibitedWords = [
            'ofensiva',
            'grosera',
            'puto',
            'puta',
            'verga',
            'zorra',
            'pendejo',
            'pendeja',
            'pene',
            'sexo',
            'nazi',
            'pela',
            'pelas',
            'mierda',
            'caca',
            'kaka',
            'popo',
            'pendejos',
            'putos',
            'putas',
            'ramera',
            'Puto',
            'Puta',
            'Pendejo',
            'Pendeja',
            'Pendejos',
            'Putos',
            'Verga',
            'Pene',
            'cabron',
            'cabrona',
            'cabrones',
            'chingada',
            'chingado',
            'chingados',
            'chingar',
            'chingona',
            'chingon',
            'culero',
            'culera',
            'culeros',
            'cojones',
            'coño',
            'coger',
            'joder',
            'gilipollas',
            'marica',
            'maricon',
            'maricona',
            'maricones',
            'mierdero',
            'mamada',
            'mamado',
            'mamadas',
            'nalgas',
            'perra',
            'perras',
            'putazo',
            'putazos',
            'rata',
            'raton',
            'malparido',
            'malnacido',
            'soplapollas',
            'tetas',
            'teta',
            'tetonas',
            'teton',
            'vagina',
            'vergas',
            'vergudo',
            'guey',
            'wey',
            'huevon',
            'huevona',
            'huevones',
            'pajero',
            'pajeros',
            'pajera',
            'pajeras',
            'chupapijas',
            'chupapollas',
            'culos',
            'tragasables',
            'come mierda',
            'come caca',
            'tragasemen',
            'tragaleche',
            'culia',
            'culiado',
            'culiada',
            'culiad@',
            'chupamela',
            'chupame',
            'marrano',
            'marrana',
            'marranos',
            'cojudo',
            'cojuda',
            'cojudos',
            'baboso',
            'babosa',
            'babosos',
            'estupido',
            'estupida',
            'idiota',
            'imbecil',
            'tarado',
            'tarada',
            'mongolico',
            'mongolica',
            'mongolitos',
            'mongoles',
            'subnormal',
            'anormal',
            'debil mental',
            'enfermo',
            'psicopata',
            'desquiciado',
            'loca',
            'loco',
            'locos',
            'demente',
            'bastardo',
            'bastarda',
            'hijo de puta',
            'hijo de perra',
            'pervertido',
            'pervertida',
            'pervertidos',
            'sucio',
            'sucia',
            'degenerado',
            'degenerada',
            'asqueroso',
            'asquerosa',
            'repugnante',
            'cerdo',
            'cerda',
            'cerdos',
            'zorrillo',
            'zorrilla',
            'putero',
            'puteros',
            'pornografico',
            'pornografia',
            'sodomita',
            'maldito',
            'maldita',
            'malditos',
            'satanico',
            'satanista',
            'demonio',
            'diablo',
            'inmundo',
            'escoria',
            'basura',
            'paria',
            'desgraciado',
            'desgraciada',
            'malnacido',
            'malnacida',
            'forro',
            'forra',
            'forros',
            'pajearse',
            'pajero',
            'pajeros',
            'pajera',
            'pajeras',
            'sorete',
            'gil',
            'hijueputa',
            'hijueputas',
            'huevon',
            'huevona',
            'huevones',
            'atontado',
            'atontada',
            'tarugo',
            'taruga',
            'nazi',
            'facha',
            'racista',
            'xenofobo',
            'homofobo',
            'machista',
            'misogino',
            'misogina',
            'culona',
            'Culona',
            'geys',
            'Gey',
        ];

        function normalizeText2($text)
        {
            $text = strtolower($text);
            $text = str_replace(
                ['@', '4', '3', '$', '0', '1', '!', '|', '€', '£', '¢', '§'],
                ['a', 'a', 'e', 's', 'o', 'i', 'i', 'i', 'e', 'l', 'c', 's'],
                $text
            );
            $text = preg_replace('/[^a-z]/', '', $text);
            return $text;
        }

        $normalizedName = normalizeText2($request->name);

        foreach ($prohibitedWords as $word) {
            if (stripos($normalizedName, normalizeText2($word)) !== false) {
                return response()->json(['message' => 'El nombre de usuario contiene palabras no permitidas.'], 400);
            }
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return response()->json(['message' => 'Nombre actualizado correctamente']);
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');

        $usuarios = User::where('name', 'like', "%{$query}%")->take(5)->get();

        return response()->json($usuarios);
    }

    public function mostrarPerfil($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }
}
