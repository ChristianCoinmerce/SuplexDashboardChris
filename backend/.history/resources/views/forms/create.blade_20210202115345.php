@extends('layouts.app')

@section('content')
<div id="form_container">
    <form class="appnitro" enctype="multipart/form-data" method="post" action="{{ route('form.store')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <ul ><li >
    <label class="description">Name</label>
    <span>
        <input name="name" class="element text" maxlength="255" size="8" value=""/>
        <label>First</label>
    </span>
    {{-- <span>
        <input name="last_name" class="element text" maxlength="255" size="14" value=""/>
        <label>Last</label>
    </span> --}}
    </li><li >
    <label class="description">Contact Name </label>
    <div>
        <input name="contact_name" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li >
    <label class="description">House Adress</label>
    <div class="left">
        <input name="street" class="element text medium" value="" type="text">
        <label>Adress</label>
    </div>
    <div class="right">
        <input name="house_number" class="element text medium" value="" type="text">
        <label>House Number</label>
    </div>
    <div class="left">
        <input name="city" class="element text medium" value="" type="text">
        <label>City</label>
    </div>
    <div class="right">
        <input name="state" class="element text medium" value="" type="text">
        <label>State / Province / Region</label>
    </div>
    <div class="left">
        <input name="zipcode" class="element text medium" maxlength="15" value="" type="text">
        <label>Postal / Zip Code</label>
    </div>
    <div class="right">
        <select class="element select medium" name="country">
        <option value="" selected="selected"></option>
            <option value="Afghanistan" >Afghanistan</option>
            <option value="Albania" >Albania</option>
            <option value="Algeria" >Algeria</option>
            <option value="Andorra" >Andorra</option>
            <option value="Antigua and Barbuda" >Antigua and Barbuda</option>
            <option value="Argentina" >Argentina</option>
            <option value="Armenia" >Armenia</option>
            <option value="Australia" >Australia</option>
            <option value="Austria" >Austria</option>
            <option value="Azerbaijan" >Azerbaijan</option>
            <option value="Bahamas" >Bahamas</option>
            <option value="Bahrain" >Bahrain</option>
            <option value="Bangladesh" >Bangladesh</option>
            <option value="Barbados" >Barbados</option>
            <option value="Belarus" >Belarus</option>
            <option value="Belgium" >Belgium</option>
            <option value="Belize" >Belize</option>
            <option value="Benin" >Benin</option>
            <option value="Bhutan" >Bhutan</option>
            <option value="Bolivia" >Bolivia</option>
            <option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
            <option value="Botswana" >Botswana</option>
            <option value="Brazil" >Brazil</option>
            <option value="Brunei" >Brunei</option>
            <option value="Bulgaria" >Bulgaria</option>
            <option value="Burkina Faso" >Burkina Faso</option>
            <option value="Burundi" >Burundi</option>
            <option value="Cambodia" >Cambodia</option>
            <option value="Cameroon" >Cameroon</option>
            <option value="Canada" >Canada</option>
            <option value="Cape Verde" >Cape Verde</option>
            <option value="Central African Republic" >Central African Republic</option>
            <option value="Chad" >Chad</option>
            <option value="Chile" >Chile</option>
            <option value="China" >China</option>
            <option value="Colombia" >Colombia</option>
            <option value="Comoros" >Comoros</option>
            <option value="Congo" >Congo</option>
            <option value="Cook Islands and Niue" >Cook Islands and Niue</option>
            <option value="Costa Rica" >Costa Rica</option>
            <option value="Côte d'Ivoire" >Côte d'Ivoire</option>
            <option value="Croatia" >Croatia</option>
            <option value="Cuba" >Cuba</option>
            <option value="Cyprus" >Cyprus</option>
            <option value="Czech Republic" >Czech Republic</option>
            <option value="Denmark" >Denmark</option>
            <option value="Djibouti" >Djibouti</option>
            <option value="Dominica" >Dominica</option>
            <option value="Dominican Republic" >Dominican Republic</option>
            <option value="East Timor" >East Timor</option>
            <option value="Ecuador" >Ecuador</option>
            <option value="Egypt" >Egypt</option>
            <option value="El Salvador" >El Salvador</option>
            <option value="Equatorial Guinea" >Equatorial Guinea</option>
            <option value="Eritrea" >Eritrea</option>
            <option value="Estonia" >Estonia</option>
            <option value="Ethiopia" >Ethiopia</option>
            <option value="Fiji" >Fiji</option>
            <option value="Finland" >Finland</option>
            <option value="France" >France</option>
            <option value="Gabon" >Gabon</option>
            <option value="Gambia" >Gambia</option>
            <option value="Georgia" >Georgia</option>
            <option value="Germany" >Germany</option>
            <option value="Ghana" >Ghana</option>
            <option value="Greece" >Greece</option>
            <option value="Grenada" >Grenada</option>
            <option value="Guatemala" >Guatemala</option>
            <option value="Guinea" >Guinea</option>
            <option value="Guinea-Bissau" >Guinea-Bissau</option>
            <option value="Guyana" >Guyana</option>
            <option value="Haiti" >Haiti</option>
            <option value="Honduras" >Honduras</option>
            <option value="Hong Kong" >Hong Kong</option>
            <option value="Hungary" >Hungary</option>
            <option value="Iceland" >Iceland</option>
            <option value="India" >India</option>
            <option value="Indonesia" >Indonesia</option>
            <option value="Iran" >Iran</option>
            <option value="Iraq" >Iraq</option>
            <option value="Ireland" >Ireland</option>
            <option value="Israel" >Israel</option>
            <option value="Italy" >Italy</option>
            <option value="Jamaica" >Jamaica</option>
            <option value="Japan" >Japan</option>
            <option value="Jordan" >Jordan</option>
            <option value="Kazakhstan" >Kazakhstan</option>
            <option value="Kenya" >Kenya</option>
            <option value="Kiribati" >Kiribati</option>
            <option value="North Korea" >North Korea</option>
            <option value="South Korea" >South Korea</option>
            <option value="Kuwait" >Kuwait</option>
            <option value="Kyrgyzstan" >Kyrgyzstan</option>
            <option value="Laos" >Laos</option>
            <option value="Latvia" >Latvia</option>
            <option value="Lebanon" >Lebanon</option>
            <option value="Lesotho" >Lesotho</option>
            <option value="Liberia" >Liberia</option>
            <option value="Libya" >Libya</option>
            <option value="Liechtenstein" >Liechtenstein</option>
            <option value="Lithuania" >Lithuania</option>
            <option value="Luxembourg" >Luxembourg</option>
            <option value="Macedonia" >Macedonia</option>
            <option value="Madagascar" >Madagascar</option>
            <option value="Malawi" >Malawi</option>
            <option value="Malaysia" >Malaysia</option>
            <option value="Maldives" >Maldives</option>
            <option value="Mali" >Mali</option>
            <option value="Malta" >Malta</option>
            <option value="Marshall Islands" >Marshall Islands</option>
            <option value="Mauritania" >Mauritania</option>
            <option value="Mauritius" >Mauritius</option>
            <option value="Mexico" >Mexico</option>
            <option value="Micronesia" >Micronesia</option>
            <option value="Moldova" >Moldova</option>
            <option value="Monaco" >Monaco</option>
            <option value="Mongolia" >Mongolia</option>
            <option value="Montenegro" >Montenegro</option>
            <option value="Morocco" >Morocco</option>
            <option value="Mozambique" >Mozambique</option>
            <option value="Myanmar" >Myanmar</option>
            <option value="Namibia" >Namibia</option>
            <option value="Nauru" >Nauru</option>
            <option value="Nepal" >Nepal</option>
            <option value="Netherlands" >Netherlands</option>
            <option value="New Zealand" >New Zealand</option>
            <option value="Nicaragua" >Nicaragua</option>
            <option value="Niger" >Niger</option>
            <option value="Nigeria" >Nigeria</option>
            <option value="Norway" >Norway</option>
            <option value="Oman" >Oman</option>
            <option value="Pakistan" >Pakistan</option>
            <option value="Palau" >Palau</option>
            <option value="Panama" >Panama</option>
            <option value="Papua New Guinea" >Papua New Guinea</option>
            <option value="Paraguay" >Paraguay</option>
            <option value="Peru" >Peru</option>
            <option value="Philippines" >Philippines</option>
            <option value="Poland" >Poland</option>
            <option value="Portugal" >Portugal</option>
            <option value="Puerto Rico" >Puerto Rico</option>
            <option value="Qatar" >Qatar</option>
            <option value="Romania" >Romania</option>
            <option value="Russia" >Russia</option>
            <option value="Rwanda" >Rwanda</option>
            <option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
            <option value="Saint Lucia" >Saint Lucia</option>
            <option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
            <option value="Samoa" >Samoa</option>
            <option value="San Marino" >San Marino</option>
            <option value="Sao Tome and Principe" >Sao Tome and Principe</option>
            <option value="Saudi Arabia" >Saudi Arabia</option>
            <option value="Senegal" >Senegal</option>
            <option value="Serbia and Montenegro" >Serbia and Montenegro</option>
            <option value="Seychelles" >Seychelles</option>
            <option value="Sierra Leone" >Sierra Leone</option>
            <option value="Singapore" >Singapore</option>
            <option value="Slovakia" >Slovakia</option>
            <option value="Slovenia" >Slovenia</option>
            <option value="Solomon Islands" >Solomon Islands</option>
            <option value="Somalia" >Somalia</option>
            <option value="South Africa" >South Africa</option>
            <option value="Spain" >Spain</option>
            <option value="Sri Lanka" >Sri Lanka</option>
            <option value="Sudan" >Sudan</option>
            <option value="Suriname" >Suriname</option>
            <option value="Swaziland" >Swaziland</option>
            <option value="Sweden" >Sweden</option>
            <option value="Switzerland" >Switzerland</option>
            <option value="Syria" >Syria</option>
            <option value="Taiwan" >Taiwan</option>
            <option value="Tajikistan" >Tajikistan</option>
            <option value="Tanzania" >Tanzania</option>
            <option value="Thailand" >Thailand</option>
            <option value="Togo" >Togo</option>
            <option value="Tonga" >Tonga</option>
            <option value="Trinidad and Tobago" >Trinidad and Tobago</option>
            <option value="Tunisia" >Tunisia</option>
            <option value="Turkey" >Turkey</option>
            <option value="Turkmenistan" >Turkmenistan</option>
            <option value="Tuvalu" >Tuvalu</option>
            <option value="Uganda" >Uganda</option>
            <option value="Ukraine" >Ukraine</option>
            <option value="United Arab Emirates" >United Arab Emirates</option>
            <option value="United Kingdom" >United Kingdom</option>
            <option value="United States" >United States</option>
            <option value="Uruguay" >Uruguay</option>
            <option value="Uzbekistan" >Uzbekistan</option>
            <option value="Vanuatu" >Vanuatu</option>
            <option value="Vatican City" >Vatican City</option>
            <option value="Venezuela" >Venezuela</option>
            <option value="Vietnam" >Vietnam</option>
            <option value="Yemen" >Yemen</option>
            <option value="Zambia" >Zambia</option>
            <option value="Zimbabwe" >Zimbabwe</option>
        </select>
    <label>Country</label>
</div>
    </li><li>
    <label class="description">Email </label>
    <div>
        <input name="email" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">Country Code</label>
    <div>
        <input name="phone_countrycode" class="element text small" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">Phone Number </label>
    <div>
        <input name="phone_number" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li class="section_break">

        <p></p>
    </li><li>
    <label class="description">Port </label>
    <div>
        <input name="port" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">Latitude
</label>
    <div>
        <input name="lat" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">Longitude </label>
    <div>
        <input name="long" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">Ranking
</label>
    <div>
        <input name="ranking" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">Web Site </label>
    <div>
        <input name="street" class="element text medium" type="text" maxlength="255" value="http://"/>
    </div>
    </li><li>
    <label class="description">Opening Days </label>
    <span>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Monday" />
        <label class="choice">Monday<div class="right">
            <input name="house_number" class="element text medium" value="" type="text">
            <label>House Number</label>
        </div></label>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Tuesday" />
        <label class="choice">Tuesday</label>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Wednesday" />
        <label class="choice">Wednesday</label>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Thursday" />
        <label class="choice">Thursday</label>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Friday" />
        <label class="choice">Friday</label>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Saturday" />
        <label class="choice">Saturday</label>
        <input name="opening_days[]" class="element checkbox" type="checkbox" value="Sunday" />
        <label class="choice">Sunday</label>
    </span>
    </li><li>
    <label class="description">Category </label>
    <div>
    <select class="element select medium" name="category">
        <option value="" selected="selected"></option>
            <option value="A" >A</option>
            <option value="B" >B</option>
            <option value="C" >C</option>
    </select>
    </div>
    </li><li>
    <label class="description">Subcategory </label>
    <div>
    <select class="element select medium"name="subcategory">
        <option value="" selected="selected"></option>
        <option value="A" >First option</option>
        <option value="B" >Second option</option>
        <option value="C" >Third option</option>
    </select>
    </div>
    </li><li>
    <label class="description">Language </label>
    <div>
    <select class="element select medium" name="language">
        <option value="" selected="selected"></option>
            <option value="English" >English</option>
            <option value="German" >German</option>
            <option value="French" >French</option>
            <option value="Dutch" >Dutch</option>
    </select>
    </div>
    </li><li>
    <label class="description">Banner </label>
    <div>
        <input name="banner" class="element file" type="file"/>
    </div>
    </li><li>
    <label class="description">Logo </label>
    <div>
        <input name="logo" class="element file" type="file"/>
    </div>
    </li><li class="section_break">
    <p></p>
    </li><li>
    <label class="description">Payment Method
</label>
    <div>
    <select class="element select medium" name="payment_method">
        <option value="" selected="selected"></option>
            <option value="1" >IDEAL</option>
            <option value="2" >PayPal</option>
            <option value="3" >Creditcard</option>
    </select>
    </div>
    </li><li>
    <label class="description">Name IBAN </label>
    <div>
        <input name="iban_name" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">IBAN </label>
    <div>
        <input name="iban_number" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">BIC/SWIFT </label>
    <div>
        <input name="bic_swift" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li class="section_break">
        <p></p>
    </li>
    <li class="buttons">
        <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
    </li>
        </ul>
    </form>
</div>
@endsection
