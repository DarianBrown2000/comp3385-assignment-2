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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        // Send email
        Mail::to('comp3385@uwi.edu', 'COMP3385 Course Admin')
            ->send(new Feedback($request->name, $request->email, $request->comment));

        return redirect('/feedback/success')->with('success', 'Feedback sent successfully!');
    }
}

