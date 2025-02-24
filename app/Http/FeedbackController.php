namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback-form');
    }

    public function send(Request $request)
    {
        $validatedData= $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $comment = $request->input('comment');

        // Send email
        Mail::to('comp3385@uwi.edu', 'COMP3385 Course Admin')
            ->send(new Feedback($name, $email, $comment));

        return redirect('/feedback/success')->with('success', 'Feedback sent successfully!');
    }
}

