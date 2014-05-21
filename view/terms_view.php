<?php
include_once('view.php');
Class TermsView extends View{

public function renderView($output){

       $html = ' <div class="row center  darktransparent " id="terms" style="width:80%;color:white;text-align:left;padding:20px;margin-top:20px;"> <h1 style="text-align:center;">Terms of Use</h1>

<h2>Preliminary</h2>
<p>Welcome to Hopin.co.in, the carpooling service that we provide to you, subject to the following terms and conditions <br>
By registering for the Services, you acknowledge that you have read and understood these terms and conditions and you agree to be bound by them. The Company may vary these terms and conditions at any time without notice to you.
The variations shall apply from the date the varied terms and conditions are posted on the Company\'s website. </p>

<h2>Registration</h2>
<p>To register for the Services, you must: <br>
(a) consent to our collection, use and disclosure of your personal information as set out in our privacy policy.<br>
(b) You have gone through the terms and conditions and agree to be bound by them.<br>
</p>

<h2>Carpool as service:</h2>
<p>Carpool is neither hire-a-car nor reward service. It is a service purely based on social responsibility to reduce vehicular traffic and fuel consumption. The money received by the car-owner cannot be considered as a reward or rent. It is just the cost of the travelling and not a profit or loss. Carpooling should not be done with the intent of commercial use.  Car-owners are not obliged to commuters and vice versa, except the service that they have promised through carpooling. Car-owners or Commuters cannot hold anybody to be responsible for the damage, loss that may arise through carpooling. 
</p>

<h2>Intellectual Property</h2>
<p>You acknowledge and agree that the statutory and other proprietary rights in respect of patents, designs, copyright, trademarks, trade secrets, processes, formulae, systems, drawings, data, specifications, documents, and other like rights relating to the Services or displayed or referred to on the Company\'s website are owned by the Company or in some cases third parties.<br>
You must not reproduce, copy, transmit, adapt, publish or communicate or otherwise exercise the intellectual property rights in the whole or any part of the material contained on the Company\'s website except with the prior written consent of the Company.<br>
</p>


<h2>Disclaimer</h2>
<p>Your use of the Services is entirely at your own risk. The Company and the Client make no representation or warranty about the accuracy or suitability of the Services or about the information or links provided on the Company\'s website. The Company and the Client and their officers, employees and agents accept no responsibility for any loss or damage however caused (including through negligence) that you may suffer directly or indirectly from or in connection with the Services or the Company\'s website.In particular you acknowledge that the Company and the Client do not screen or monitor Members and have no way of ensuring that the information contributed by Members is accurate.<br>
If any of these terms and conditions (or part of them) is held to be invalid or unenforceable, these terms and conditions will remain in full force, apart from the term or condition or part of it that is held to be invalid or unenforceable which will be deleted to the minimum extent necessary for these terms and conditions to be valid and enforceable.<br>
</p>
<br>

<h2>Privacy</h2>
<h2>Personal Information</h2>
<p>
Personal information is any information about you that identifies you or from which your identity can be reasonably determined.<br>
In order to offer our service we need to collect and use personal information about you. We also need to disclose some of your personal information. <br>
They types of personal information disclosed by us as part of our service are listed below under the section headed \'Disclosur\'. <br>
However be assured that our intention is that none of the personal information that is disclosed by us, as part of providing our service, is sufficient for other parties to identify your private address, exactly your registered source point or exact registered destination, your actual identity, full name or contact details.
All of your personal details, other than those listed below, are kept secure and are not available or visible to any other party and any disclosure of these details can only occur if you choose to make such disclosure yourself. <br>
</p>


<h2>Collection</h2>
<p>When you register with us you will be asked to provide certain personal information. We request this information to allow us to provide you with our customised carpool matching service. If you do not provide the information, we are unable to provide our service to you. <br>
When you view our website, our internet service provider ("ISP") will collect certain information about you and your visit. This information in collected in the following ways: - Depending on the type of browser you use and how it is set up, we will collect certain information provided to our ISP by your browser. Usually, this information includes your server address, your top level domain name, your browser type, the date and time of your visit to our site, the pages on our site that you have accessed and the documents you have downloaded from our site. We only use this information to aggregate. We do not use this information to identify individuals who visit our site. 
- We will collect certain information through the use of cookies. You may find that some of the features of our website are not available if you do not accept cookies.<br>
</p>
<h2>Use</h2>
<p>Subject to this Privacy Policy and the Terms and Conditions we make no representation, warranty or guarantee that your personal information will be confidential to us.<br>
As you will see below, the nature of our services and our business requires us to disclose your personal information to a number of other users.<br>
We will use the personal information we collect about you for the following purposes: <br>
- providing you with our services; <br>
- gaining an understanding of your needs to provide you with a better service; <br>
- running our business, including managing our accounts, research and development of our products and services; and 
- meeting our legal requirements.<br>
We will not use your personal information other than to communicate with you about the Service. We will ensure that your personal information is kept secure under the terms of this policy.<br>
</p>
<h2>Disclosure</h2>
<p>This is the nature of our carpool matching service.<br>
The kind of personal information that we will disclose to other users of our service includes: 
Your Facebook account details; <br>
Your First Name and Last name<br>
Preferences and general information that you entered during the setup process; <br>
Your Gender; <br>
Travelling details like source and destination <br>
Any other information we think is necessary and to which you have consented to enable our other users to assess your compatibility.<br>
We may also provide marketing agents, our professional advisors, potential investors, business purchasers, and government organisations with aggregated information only and not information identifying you personally. However, in some instances, such as when we are taking advice from our legal advisors, or where the law requires us to make disclosure, we may disclose personal information about you.<br>
If directed by an authorised officer of the Client, we will allow authorised Client employees to obtain reports of usage information which will identify your personal information. <br>
</p>
<h2>Consent</h2>
<p>
To the extent that we are required by law to obtain your consent for our collection, use and disclosure of your personal information as detailed above, by viewing our website and registering for our services, you are indicating your consent to the collection, use and disclosure of your personal information<br>
</p>

</div>
';

	parent::renderView($html);
}

}
?>
