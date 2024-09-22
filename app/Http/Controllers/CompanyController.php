<?php

// CompanyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    // List of companies and their corresponding email addresses
    private $companies = [
        'americanamicable' => 'americanamicable@felifeinsurance.com',
        'aetna' => 'aetna@felifeinsurance.com',
        'mutualofomaha' => 'mutualofomaha@felifeinsurance.com',
        'globelifeinsurance' => 'globelifeinsurance@felifeinsurance.com',
        'cica-lifeofamerica' => 'cica-lifeofamerica@felifeinsurance.com',
        'aig' => 'aig@felifeinsurance.com',
        'prosperitylife' => 'prosperitylife@felifeinsurance.com',
        'gtlic' => 'gtlic@felifeinsurance.com',
        'royalneighborsofamerica' => 'royalneighborsofamerica@felifeinsurance.com',
        'sslco' => 'sslco@felifeinsurance.com',
        'lbig' => 'lbig@felifeinsurance.com',
        'aflac' => 'aflac@felifeinsurance.com',
        'aetnacvshealth' => 'aetnacvshealth@felifeinsurance.com',
        'americolife' => 'americolife@felifeinsurance.com',
        'sbli' => 'sbli@felifeinsurance.com',
    ];

    // Show the form for requesting a quote
    public function showForm()
    {
        return view('insurance_request');
    }

    // Handle the form submission
    public function handleSubmit(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'plan' => 'required|string',
        ]);

        // Get the email and plan from the request
        $userEmail = $request->input('email');
        $plan = $request->input('plan'); // This line retrieves the plan

        // Check if the plan variable is set
        if (isset($plan)) {
            $senderEmail = '';

            // Determine which email to send from based on the selected plan
            if ($plan === 'americanamicable') {
                $senderEmail = $this->companies['americanamicable'];
            } elseif ($plan === 'aetna') {
                $senderEmail = $this->companies['aetna'];
            } elseif ($plan === 'mutualofomaha') {
                $senderEmail = $this->companies['mutualofomaha'];
            } elseif ($plan === 'globelifeinsurance') {
                $senderEmail = $this->companies['globelifeinsurance'];
            } elseif ($plan === 'cica-lifeofamerica') {
                $senderEmail = $this->companies['cica-lifeofamerica'];
            } elseif ($plan === 'aig') {
                $senderEmail = $this->companies['aig'];
            } elseif ($plan === 'prosperitylife') {
                $senderEmail = $this->companies['prosperitylife'];
            } elseif ($plan === 'gtlic') {
                $senderEmail = $this->companies['gtlic'];
            } elseif ($plan === 'royalneighborsofamerica') {
                $senderEmail = $this->companies['royalneighborsofamerica'];
            } elseif ($plan === 'sslco') {
                $senderEmail = $this->companies['sslco'];
            } elseif ($plan === 'lbig') {
                $senderEmail = $this->companies['lbig'];
            } elseif ($plan === 'aflac') {
                $senderEmail = $this->companies['aflac'];
            } elseif ($plan === 'aetnacvshealth') {
                $senderEmail = $this->companies['aetnacvshealth'];
            } elseif ($plan === 'americolife') {
                $senderEmail = $this->companies['americolife'];
            } elseif ($plan === 'sbli') {
                $senderEmail = $this->companies['sbli'];
            }

            // Send the email to the user
            if ($senderEmail) {
                Mail::raw('Thank you for requesting a quote for '.ucfirst($plan).'!', function ($message) use ($userEmail, $senderEmail) {
                    $message->from($senderEmail)
                        ->to($userEmail)
                        ->subject('Quote Request for '.ucfirst($plan));
                });

                return redirect()->back()->with('success', 'Quote request sent successfully from '.$senderEmail);
            } else {
                return redirect()->back()->with('error', 'Invalid plan selected.');
            }
        } else {
            return redirect()->back()->with('error', 'Plan is not defined.');
        }
    }
}
