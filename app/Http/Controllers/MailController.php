<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP de Outlook
            $mail->isSMTP();
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'soporte.ortographic@outlook.com';
            $mail->Password   = 'Ortographic27'; // Reemplázala por la contraseña correcta
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Remitente y destinatario
            $mail->setFrom('soporte.ortographic@outlook.com', 'Soporte Ortographic');
            $mail->addAddress($request->input('email')); // Destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Mensaje de Soporte Ortographic';
            $mail->Body    = '<h2>Hola,</h2><p>' . $request->input('mensaje') . '</p><p>Saludos,<br>Equipo Ortographic</p>';

            // Enviar correo
            $mail->send();

            return back()->with('success', 'Correo enviado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al enviar el correo: ' . $mail->ErrorInfo);
        }
    }
}
