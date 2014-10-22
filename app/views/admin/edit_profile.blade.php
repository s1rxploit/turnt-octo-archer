@extends('customer.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Edit Profile </h3>
	</div>
</div>

@include('customer.layouts.notify')

{{Form::open(['url'=>'/customer/profile/edit','method'=>'post','files'=>true,'class'=>'form-horizontal form-bordered','role'=>'form'])}}

<!-- Button trigger modal -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Edit Profile</h6>
		<div class="table-controls pull-right">
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-sm-2 control-label">Change Avatar</label>
			<div class="col-sm-10">
				<p><img class="img-circle" style="width:80px;" src="{{$profile->avatar}}"/>
				</p>
				<input name="avatar" type="file" class="form-control">
				<input name="old_avatar" type="hidden" value="{{$profile->avatar}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input disabled name="email" type="text" class="form-control" value="{{$profile->email}}">
			</div>
		</div>

<!--
		<div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input name="username" type="text" class="form-control" value="{{Input::old('username',$profile->username)}}">
			</div>
		</div>
-->
		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input name="name" type="text" class="form-control" value="{{Input::old('name',$profile->name)}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Date of Birth</label>
			<div class="col-sm-10">
                 <input id="birthday" name="birthday" type="text" class="form-control" value="{{Input::old('birthday',date('d-m-Y',strtotime($profile->birthday)))}}">
            </div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Bio</label>
			<div class="col-sm-10">
				<textarea name="bio" class="form-control">{{Input::old('bio',$profile->bio)}}</textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-1">
				<input value="male" name="gender" type="radio" {{Input::old('gender',$profile->gender)=="male"?"checked":""}}> Male
			</div>
			<div class="col-sm-1">
            	<input value="female" name="gender" type="radio" {{Input::old('gender',$profile->gender)=="female"?"checked":""}}> Female
            </div>

		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Mobile No</label>
			<div class="col-sm-10">
				<input name="mobile_no" type="text" class="form-control" value="{{Input::old('mobile_no',$profile->mobile_no)}}">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Country</label>
			<div class="col-sm-10">
				<select name="country" class="form-control">
				    <option {{Input::old('country',$profile->country)=="Afghanistan"?"selected":""}} value="Afghanistan">Afghanistan</option>
                    <option {{Input::old('country',$profile->country)=="Albania"?"selected":""}} value="Albania">Albania</option>
                    <option {{Input::old('country',$profile->country)=="Algeria"?"selected":""}} value="Algeria">Algeria</option>
                    <option {{Input::old('country',$profile->country)=="American Samoa"?"selected":""}} value="American Samoa">American Samoa</option>
                    <option {{Input::old('country',$profile->country)=="Andorra"?"selected":""}} value="Andorra">Andorra</option>
                    <option {{Input::old('country',$profile->country)=="Angola"?"selected":""}} value="Angola">Angola</option>
                    <option {{Input::old('country',$profile->country)=="Anguilla"?"selected":""}} value="Anguilla">Anguilla</option>
                    <option {{Input::old('country',$profile->country)=="Antigua & Barbuda"?"selected":""}} value="Antigua & Barbuda">Antigua &amp; Barbuda</option>
                    <option {{Input::old('country',$profile->country)=="Argentina"?"selected":""}} value="Argentina">Argentina</option>
                    <option {{Input::old('country',$profile->country)=="Armenia"?"selected":""}} value="Armenia">Armenia</option>
                    <option {{Input::old('country',$profile->country)=="Aruba"?"selected":""}} value="Aruba">Aruba</option>
                    <option {{Input::old('country',$profile->country)=="Australia"?"selected":""}} value="Australia">Australia</option>
                    <option {{Input::old('country',$profile->country)=="Austria"?"selected":""}} value="Austria">Austria</option>
                    <option {{Input::old('country',$profile->country)=="Azerbaijan"?"selected":""}} value="Azerbaijan">Azerbaijan</option>
                    <option {{Input::old('country',$profile->country)=="Bahamas"?"selected":""}} value="Bahamas">Bahamas</option>
                    <option {{Input::old('country',$profile->country)=="Bahrain"?"selected":""}} value="Bahrain">Bahrain</option>
                    <option {{Input::old('country',$profile->country)=="Bangladesh"?"selected":""}} value="Bangladesh">Bangladesh</option>
                    <option {{Input::old('country',$profile->country)=="Barbados"?"selected":""}} value="Barbados">Barbados</option>
                    <option {{Input::old('country',$profile->country)=="Belarus"?"selected":""}} value="Belarus">Belarus</option>
                    <option {{Input::old('country',$profile->country)=="Belgium"?"selected":""}} value="Belgium">Belgium</option>
                    <option {{Input::old('country',$profile->country)=="Belize"?"selected":""}} value="Belize">Belize</option>
                    <option {{Input::old('country',$profile->country)=="Benin"?"selected":""}} value="Benin">Benin</option>
                    <option {{Input::old('country',$profile->country)=="Bermuda"?"selected":""}} value="Bermuda">Bermuda</option>
                    <option {{Input::old('country',$profile->country)=="Bhutan"?"selected":""}} value="Bhutan">Bhutan</option>
                    <option {{Input::old('country',$profile->country)=="Bolivia"?"selected":""}} value="Bolivia">Bolivia</option>
                    <option {{Input::old('country',$profile->country)=="Bonaire"?"selected":""}} value="Bonaire">Bonaire</option>
                    <option {{Input::old('country',$profile->country)=="Bosnia & Herzegovina"?"selected":""}} value="Bosnia & Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option {{Input::old('country',$profile->country)=="Botswana"?"selected":""}} value="Botswana">Botswana</option>
                    <option {{Input::old('country',$profile->country)=="Brazil"?"selected":""}} value="Brazil">Brazil</option>
                    <option {{Input::old('country',$profile->country)=="British Indian Ocean Territory"?"selected":""}} value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option {{Input::old('country',$profile->country)=="Brunei"?"selected":""}} value="Brunei">Brunei</option>
                    <option {{Input::old('country',$profile->country)=="Bulgaria"?"selected":""}} value="Bulgaria">Bulgaria</option>
                    <option {{Input::old('country',$profile->country)=="Burkina Faso"?"selected":""}} value="Burkina Faso">Burkina Faso</option>
                    <option {{Input::old('country',$profile->country)=="Burundi"?"selected":""}} value="Burundi">Burundi</option>
                    <option {{Input::old('country',$profile->country)=="Cambodia"?"selected":""}} value="Cambodia">Cambodia</option>
                    <option {{Input::old('country',$profile->country)=="Cameroon"?"selected":""}} value="Cameroon">Cameroon</option>
                    <option {{Input::old('country',$profile->country)=="Canada"?"selected":""}} value="Canada">Canada</option>
                    <option {{Input::old('country',$profile->country)=="Canary Islands"?"selected":""}} value="Canary Islands">Canary Islands</option>
                    <option {{Input::old('country',$profile->country)=="Cape Verde"?"selected":""}} value="Cape Verde">Cape Verde</option>
                    <option {{Input::old('country',$profile->country)=="Cayman Islands"?"selected":""}} value="Cayman Islands">Cayman Islands</option>
                    <option {{Input::old('country',$profile->country)=="Central African Republic"?"selected":""}} value="Central African Republic">Central African Republic</option>
                    <option {{Input::old('country',$profile->country)=="Chad"?"selected":""}} value="Chad">Chad</option>
                    <option {{Input::old('country',$profile->country)=="Channel Islands"?"selected":""}} value="Channel Islands">Channel Islands</option>
                    <option {{Input::old('country',$profile->country)=="Chile"?"selected":""}} value="Chile">Chile</option>
                    <option {{Input::old('country',$profile->country)=="China"?"selected":""}} value="China">China</option>
                    <option {{Input::old('country',$profile->country)=="Christmas Island"?"selected":""}} value="Christmas Island">Christmas Island</option>
                    <option {{Input::old('country',$profile->country)=="Cocos Island"?"selected":""}} value="Cocos Island">Cocos Island</option>
                    <option {{Input::old('country',$profile->country)=="Colombia"?"selected":""}} value="Colombia">Colombia</option>
                    <option {{Input::old('country',$profile->country)=="Comoros"?"selected":""}} value="Comoros">Comoros</option>
                    <option {{Input::old('country',$profile->country)=="Congo"?"selected":""}} value="Congo">Congo</option>
                    <option {{Input::old('country',$profile->country)=="Cook Islands"?"selected":""}} value="Cook Islands">Cook Islands</option>
                    <option {{Input::old('country',$profile->country)=="Costa Rica"?"selected":""}} value="Costa Rica">Costa Rica</option>
                    <option {{Input::old('country',$profile->country)=="Cote D'Ivoire"?"selected":""}} value="Cote D'Ivoire">Cote D'Ivoire</option>
                    <option {{Input::old('country',$profile->country)=="Croatia"?"selected":""}} value="Croatia">Croatia</option>
                    <option {{Input::old('country',$profile->country)=="Cuba"?"selected":""}} value="Cuba">Cuba</option>
                    <option {{Input::old('country',$profile->country)=="Curacao"?"selected":""}} value="Curacao">Curacao</option>
                    <option {{Input::old('country',$profile->country)=="Cyprus"?"selected":""}} value="Cyprus">Cyprus</option>
                    <option {{Input::old('country',$profile->country)=="Czech Republic"?"selected":""}} value="Czech Republic">Czech Republic</option>
                    <option {{Input::old('country',$profile->country)=="Denmark"?"selected":""}} value="Denmark">Denmark</option>
                    <option {{Input::old('country',$profile->country)=="Djibouti"?"selected":""}} value="Djibouti">Djibouti</option>
                    <option {{Input::old('country',$profile->country)=="Dominica"?"selected":""}} value="Dominica">Dominica</option>
                    <option {{Input::old('country',$profile->country)=="Dominican Republic"?"selected":""}} value="Dominican Republic">Dominican Republic</option>
                    <option {{Input::old('country',$profile->country)=="East Timor"?"selected":""}} value="East Timor">East Timor</option>
                    <option {{Input::old('country',$profile->country)=="Ecuador"?"selected":""}} value="Ecuador">Ecuador</option>
                    <option {{Input::old('country',$profile->country)=="Egypt"?"selected":""}} value="Egypt">Egypt</option>
                    <option {{Input::old('country',$profile->country)=="El Salvador"?"selected":""}} value="El Salvador">El Salvador</option>
                    <option {{Input::old('country',$profile->country)=="Equatorial Guinea"?"selected":""}} value="Equatorial Guinea">Equatorial Guinea</option>
                    <option {{Input::old('country',$profile->country)=="Eritrea"?"selected":""}} value="Eritrea">Eritrea</option>
                    <option {{Input::old('country',$profile->country)=="Estonia"?"selected":""}} value="Estonia">Estonia</option>
                    <option {{Input::old('country',$profile->country)=="Ethiopia"?"selected":""}} value="Ethiopia">Ethiopia</option>
                    <option {{Input::old('country',$profile->country)=="Falkland Islands"?"selected":""}} value="Falkland Islands">Falkland Islands</option>
                    <option {{Input::old('country',$profile->country)=="Faroe Islands"?"selected":""}} value="Faroe Islands">Faroe Islands</option>
                    <option {{Input::old('country',$profile->country)=="Fiji"?"selected":""}} value="Fiji">Fiji</option>
                    <option {{Input::old('country',$profile->country)=="Finland"?"selected":""}} value="Finland">Finland</option>
                    <option {{Input::old('country',$profile->country)=="France"?"selected":""}} value="France">France</option>
                    <option {{Input::old('country',$profile->country)=="French Guiana"?"selected":""}} value="French Guiana">French Guiana</option>
                    <option {{Input::old('country',$profile->country)=="French Polynesia"?"selected":""}} value="French Polynesia">French Polynesia</option>
                    <option {{Input::old('country',$profile->country)=="French Southern Ter"?"selected":""}} value="French Southern Ter">French Southern Ter</option>
                    <option {{Input::old('country',$profile->country)=="Gabon"?"selected":""}} value="Gabon">Gabon</option>
                    <option {{Input::old('country',$profile->country)=="Gambia"?"selected":""}} value="Gambia">Gambia</option>
                    <option {{Input::old('country',$profile->country)=="Georgia"?"selected":""}} value="Georgia">Georgia</option>
                    <option {{Input::old('country',$profile->country)=="Germany"?"selected":""}} value="Germany">Germany</option>
                    <option {{Input::old('country',$profile->country)=="Ghana"?"selected":""}} value="Ghana">Ghana</option>
                    <option {{Input::old('country',$profile->country)=="Gibraltar"?"selected":""}} value="Gibraltar">Gibraltar</option>
                    <option {{Input::old('country',$profile->country)=="Great Britain"?"selected":""}} value="Great Britain">Great Britain</option>
                    <option {{Input::old('country',$profile->country)=="Greece"?"selected":""}} value="Greece">Greece</option>
                    <option {{Input::old('country',$profile->country)=="Greenland"?"selected":""}} value="Greenland">Greenland</option>
                    <option {{Input::old('country',$profile->country)=="Grenada"?"selected":""}} value="Grenada">Grenada</option>
                    <option {{Input::old('country',$profile->country)=="Guadeloupe"?"selected":""}} value="Guadeloupe">Guadeloupe</option>
                    <option {{Input::old('country',$profile->country)=="Guam"?"selected":""}} value="Guam">Guam</option>
                    <option {{Input::old('country',$profile->country)=="Guatemala"?"selected":""}} value="Guatemala">Guatemala</option>
                    <option {{Input::old('country',$profile->country)=="Guinea"?"selected":""}} value="Guinea">Guinea</option>
                    <option {{Input::old('country',$profile->country)=="Guyana"?"selected":""}} value="Guyana">Guyana</option>
                    <option {{Input::old('country',$profile->country)=="Haiti"?"selected":""}} value="Haiti">Haiti</option>
                    <option {{Input::old('country',$profile->country)=="Hawaii"?"selected":""}} value="Hawaii">Hawaii</option>
                    <option {{Input::old('country',$profile->country)=="Honduras"?"selected":""}} value="Honduras">Honduras</option>
                    <option {{Input::old('country',$profile->country)=="Hong Kong"?"selected":""}} value="Hong Kong">Hong Kong</option>
                    <option {{Input::old('country',$profile->country)=="Hungary"?"selected":""}} value="Hungary">Hungary</option>
                    <option {{Input::old('country',$profile->country)=="Iceland"?"selected":""}} value="Iceland">Iceland</option>
                    <option {{Input::old('country',$profile->country)=="India"?"selected":""}} value="India">India</option>
                    <option {{Input::old('country',$profile->country)=="Indonesia"?"selected":""}} value="Indonesia">Indonesia</option>
                    <option {{Input::old('country',$profile->country)=="Iran"?"selected":""}} value="Iran">Iran</option>
                    <option {{Input::old('country',$profile->country)=="Iraq"?"selected":""}} value="Iraq">Iraq</option>
                    <option {{Input::old('country',$profile->country)=="Ireland"?"selected":""}} value="Ireland">Ireland</option>
                    <option {{Input::old('country',$profile->country)=="Isle of Man"?"selected":""}} value="Isle of Man">Isle of Man</option>
                    <option {{Input::old('country',$profile->country)=="Israel"?"selected":""}} value="Israel">Israel</option>
                    <option {{Input::old('country',$profile->country)=="Italy"?"selected":""}} value="Italy">Italy</option>
                    <option {{Input::old('country',$profile->country)=="Jamaica"?"selected":""}} value="Jamaica">Jamaica</option>
                    <option {{Input::old('country',$profile->country)=="Japan"?"selected":""}} value="Japan">Japan</option>
                    <option {{Input::old('country',$profile->country)=="Jordan"?"selected":""}} value="Jordan">Jordan</option>
                    <option {{Input::old('country',$profile->country)=="Kazakhstan"?"selected":""}} value="Kazakhstan">Kazakhstan</option>
                    <option {{Input::old('country',$profile->country)=="Kenya"?"selected":""}} value="Kenya">Kenya</option>
                    <option {{Input::old('country',$profile->country)=="Kiribati"?"selected":""}} value="Kiribati">Kiribati</option>
                    <option {{Input::old('country',$profile->country)=="Korea North"?"selected":""}} value="Korea North">Korea North</option>
                    <option {{Input::old('country',$profile->country)=="Korea South"?"selected":""}} value="Korea South">Korea South</option>
                    <option {{Input::old('country',$profile->country)=="Kuwait"?"selected":""}} value="Kuwait">Kuwait</option>
                    <option {{Input::old('country',$profile->country)=="Kyrgyzstan"?"selected":""}} value="Kyrgyzstan">Kyrgyzstan</option>
                    <option {{Input::old('country',$profile->country)=="Laos"?"selected":""}} value="Laos">Laos</option>
                    <option {{Input::old('country',$profile->country)=="Latvia"?"selected":""}} value="Latvia">Latvia</option>
                    <option {{Input::old('country',$profile->country)=="Lebanon"?"selected":""}} value="Lebanon">Lebanon</option>
                    <option {{Input::old('country',$profile->country)=="Lesotho"?"selected":""}} value="Lesotho">Lesotho</option>
                    <option {{Input::old('country',$profile->country)=="Liberia"?"selected":""}} value="Liberia">Liberia</option>
                    <option {{Input::old('country',$profile->country)=="Libya"?"selected":""}} value="Libya">Libya</option>
                    <option {{Input::old('country',$profile->country)=="Liechtenstein"?"selected":""}} value="Liechtenstein">Liechtenstein</option>
                    <option {{Input::old('country',$profile->country)=="Lithuania"?"selected":""}} value="Lithuania">Lithuania</option>
                    <option {{Input::old('country',$profile->country)=="Luxembourg"?"selected":""}} value="Luxembourg">Luxembourg</option>
                    <option {{Input::old('country',$profile->country)=="Macau"?"selected":""}} value="Macau">Macau</option>
                    <option {{Input::old('country',$profile->country)=="Macedonia"?"selected":""}} value="Macedonia">Macedonia</option>
                    <option {{Input::old('country',$profile->country)=="Madagascar"?"selected":""}} value="Madagascar">Madagascar</option>
                    <option {{Input::old('country',$profile->country)=="Malaysia"?"selected":""}} value="Malaysia">Malaysia</option>
                    <option {{Input::old('country',$profile->country)=="Malawi"?"selected":""}} value="Malawi">Malawi</option>
                    <option {{Input::old('country',$profile->country)=="Maldives"?"selected":""}} value="Maldives">Maldives</option>
                    <option {{Input::old('country',$profile->country)=="Mali"?"selected":""}} value="Mali">Mali</option>
                    <option {{Input::old('country',$profile->country)=="Malta"?"selected":""}} value="Malta">Malta</option>
                    <option {{Input::old('country',$profile->country)=="Marshall Islands"?"selected":""}} value="Marshall Islands">Marshall Islands</option>
                    <option {{Input::old('country',$profile->country)=="Martinique"?"selected":""}} value="Martinique">Martinique</option>
                    <option {{Input::old('country',$profile->country)=="Mauritania"?"selected":""}} value="Mauritania">Mauritania</option>
                    <option {{Input::old('country',$profile->country)=="Mauritius"?"selected":""}} value="Mauritius">Mauritius</option>
                    <option {{Input::old('country',$profile->country)=="Mayotte"?"selected":""}} value="Mayotte">Mayotte</option>
                    <option {{Input::old('country',$profile->country)=="Mexico"?"selected":""}} value="Mexico">Mexico</option>
                    <option {{Input::old('country',$profile->country)=="Midway Islands"?"selected":""}} value="Midway Islands">Midway Islands</option>
                    <option {{Input::old('country',$profile->country)=="Moldova"?"selected":""}} value="Moldova">Moldova</option>
                    <option {{Input::old('country',$profile->country)=="Monaco"?"selected":""}} value="Monaco">Monaco</option>
                    <option {{Input::old('country',$profile->country)=="Mongolia"?"selected":""}} value="Mongolia">Mongolia</option>
                    <option {{Input::old('country',$profile->country)=="Montserrat"?"selected":""}} value="Montserrat">Montserrat</option>
                    <option {{Input::old('country',$profile->country)=="Morocco"?"selected":""}} value="Morocco">Morocco</option>
                    <option {{Input::old('country',$profile->country)=="Mozambique"?"selected":""}} value="Mozambique">Mozambique</option>
                    <option {{Input::old('country',$profile->country)=="Myanmar"?"selected":""}} value="Myanmar">Myanmar</option>
                    <option {{Input::old('country',$profile->country)=="Nambia"?"selected":""}} value="Nambia">Nambia</option>
                    <option {{Input::old('country',$profile->country)=="Nauru"?"selected":""}} value="Nauru">Nauru</option>
                    <option {{Input::old('country',$profile->country)=="Nepal"?"selected":""}} value="Nepal">Nepal</option>
                    <option {{Input::old('country',$profile->country)=="Netherland Antilles"?"selected":""}} value="Netherland Antilles">Netherland Antilles</option>
                    <option {{Input::old('country',$profile->country)=="Netherlands (Holland, Europe)"?"selected":""}} value="Netherlands (Holland, Europe)">Netherlands (Holland, Europe)</option>
                    <option {{Input::old('country',$profile->country)=="Nevis"?"selected":""}} value="Nevis">Nevis</option>
                    <option {{Input::old('country',$profile->country)=="New Caledonia"?"selected":""}} value="New Caledonia">New Caledonia</option>
                    <option {{Input::old('country',$profile->country)=="New Zealand"?"selected":""}} value="New Zealand">New Zealand</option>
                    <option {{Input::old('country',$profile->country)=="Nicaragua"?"selected":""}} value="Nicaragua">Nicaragua</option>
                    <option {{Input::old('country',$profile->country)=="Niger"?"selected":""}} value="Niger">Niger</option>
                    <option {{Input::old('country',$profile->country)=="Nigeria"?"selected":""}} value="Nigeria">Nigeria</option>
                    <option {{Input::old('country',$profile->country)=="Niue"?"selected":""}} value="Niue">Niue</option>
                    <option {{Input::old('country',$profile->country)=="Norfolk Island"?"selected":""}} value="Norfolk Island">Norfolk Island</option>
                    <option {{Input::old('country',$profile->country)=="Norway"?"selected":""}} value="Norway">Norway</option>
                    <option {{Input::old('country',$profile->country)=="Oman"?"selected":""}} value="Oman">Oman</option>
                    <option {{Input::old('country',$profile->country)=="Pakistan"?"selected":""}} value="Pakistan">Pakistan</option>
                    <option {{Input::old('country',$profile->country)=="Palau Island"?"selected":""}} value="Palau Island">Palau Island</option>
                    <option {{Input::old('country',$profile->country)=="Palestine"?"selected":""}} value="Palestine">Palestine</option>
                    <option {{Input::old('country',$profile->country)=="Panama"?"selected":""}} value="Panama">Panama</option>
                    <option {{Input::old('country',$profile->country)=="Papua New Guinea"?"selected":""}} value="Papua New Guinea">Papua New Guinea</option>
                    <option {{Input::old('country',$profile->country)=="Paraguay"?"selected":""}} value="Paraguay">Paraguay</option>
                    <option {{Input::old('country',$profile->country)=="Peru"?"selected":""}} value="Peru">Peru</option>
                    <option {{Input::old('country',$profile->country)=="Philippines"?"selected":""}} value="Philippines">Philippines</option>
                    <option {{Input::old('country',$profile->country)=="Pitcairn Island"?"selected":""}} value="Pitcairn Island">Pitcairn Island</option>
                    <option {{Input::old('country',$profile->country)=="Poland"?"selected":""}} value="Poland">Poland</option>
                    <option {{Input::old('country',$profile->country)=="Portugal"?"selected":""}} value="Portugal">Portugal</option>
                    <option {{Input::old('country',$profile->country)=="Puerto Rico"?"selected":""}} value="Puerto Rico">Puerto Rico</option>
                    <option {{Input::old('country',$profile->country)=="Qatar"?"selected":""}} value="Qatar">Qatar</option>
                    <option {{Input::old('country',$profile->country)=="Republic of Montenegro"?"selected":""}} value="Republic of Montenegro">Republic of Montenegro</option>
                    <option {{Input::old('country',$profile->country)=="Republic of Serbia"?"selected":""}} value="Republic of Serbia">Republic of Serbia</option>
                    <option {{Input::old('country',$profile->country)=="Reunion"?"selected":""}} value="Reunion">Reunion</option>
                    <option {{Input::old('country',$profile->country)=="Romania"?"selected":""}} value="Romania">Romania</option>
                    <option {{Input::old('country',$profile->country)=="Russia"?"selected":""}} value="Russia">Russia</option>
                    <option {{Input::old('country',$profile->country)=="Rwanda"?"selected":""}} value="Rwanda">Rwanda</option>
                    <option {{Input::old('country',$profile->country)=="St Barthelemy"?"selected":""}} value="St Barthelemy">St Barthelemy</option>
                    <option {{Input::old('country',$profile->country)=="St Eustatius"?"selected":""}} value="St Eustatius">St Eustatius</option>
                    <option {{Input::old('country',$profile->country)=="St Helena"?"selected":""}} value="St Helena">St Helena</option>
                    <option {{Input::old('country',$profile->country)=="St Kitts-Nevis"?"selected":""}} value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option {{Input::old('country',$profile->country)=="St Lucia"?"selected":""}} value="St Lucia">St Lucia</option>
                    <option {{Input::old('country',$profile->country)=="St Maarten"?"selected":""}} value="St Maarten">St Maarten</option>
                    <option {{Input::old('country',$profile->country)=="St Pierre & Miquelon"?"selected":""}} value="St Pierre & Miquelon">St Pierre &amp; Miquelon</option>
                    <option {{Input::old('country',$profile->country)=="St Vincent & Grenadines"?"selected":""}} value="St Vincent & Grenadines">St Vincent &amp; Grenadines</option>
                    <option {{Input::old('country',$profile->country)=="Saipan"?"selected":""}} value="Saipan">Saipan</option>
                    <option {{Input::old('country',$profile->country)=="Samoa"?"selected":""}} value="Samoa">Samoa</option>
                    <option {{Input::old('country',$profile->country)=="Samoa American"?"selected":""}} value="Samoa American">Samoa American</option>
                    <option {{Input::old('country',$profile->country)=="San Marino"?"selected":""}} value="San Marino">San Marino</option>
                    <option {{Input::old('country',$profile->country)=="Sao Tome & Principe"?"selected":""}} value="Sao Tome & Principe">Sao Tome &amp; Principe</option>
                    <option {{Input::old('country',$profile->country)=="Saudi Arabia"?"selected":""}} value="Saudi Arabia">Saudi Arabia</option>
                    <option {{Input::old('country',$profile->country)=="Senegal"?"selected":""}} value="Senegal">Senegal</option>
                    <option {{Input::old('country',$profile->country)=="Serbia"?"selected":""}} value="Serbia">Serbia</option>
                    <option {{Input::old('country',$profile->country)=="Seychelles"?"selected":""}} value="Seychelles">Seychelles</option>
                    <option {{Input::old('country',$profile->country)=="Sierra Leone"?"selected":""}} value="Sierra Leone">Sierra Leone</option>
                    <option {{Input::old('country',$profile->country)=="Singapore"?"selected":""}} value="Singapore">Singapore</option>
                    <option {{Input::old('country',$profile->country)=="Slovakia"?"selected":""}} value="Slovakia">Slovakia</option>
                    <option {{Input::old('country',$profile->country)=="Slovenia"?"selected":""}} value="Slovenia">Slovenia</option>
                    <option {{Input::old('country',$profile->country)=="Solomon Islands"?"selected":""}} value="Solomon Islands">Solomon Islands</option>
                    <option {{Input::old('country',$profile->country)=="Somalia"?"selected":""}} value="Somalia">Somalia</option>
                    <option {{Input::old('country',$profile->country)=="South Africa"?"selected":""}} value="South Africa">South Africa</option>
                    <option {{Input::old('country',$profile->country)=="Spain"?"selected":""}} value="Spain">Spain</option>
                    <option {{Input::old('country',$profile->country)=="Sri Lanka"?"selected":""}} value="Sri Lanka">Sri Lanka</option>
                    <option {{Input::old('country',$profile->country)=="Sudan"?"selected":""}} value="Sudan">Sudan</option>
                    <option {{Input::old('country',$profile->country)=="Suriname"?"selected":""}} value="Suriname">Suriname</option>
                    <option {{Input::old('country',$profile->country)=="Swaziland"?"selected":""}} value="Swaziland">Swaziland</option>
                    <option {{Input::old('country',$profile->country)=="Sweden"?"selected":""}} value="Sweden">Sweden</option>
                    <option {{Input::old('country',$profile->country)=="Switzerland"?"selected":""}} value="Switzerland">Switzerland</option>
                    <option {{Input::old('country',$profile->country)=="Syria"?"selected":""}} value="Syria">Syria</option>
                    <option {{Input::old('country',$profile->country)=="Tahiti"?"selected":""}} value="Tahiti">Tahiti</option>
                    <option {{Input::old('country',$profile->country)=="Taiwan"?"selected":""}} value="Taiwan">Taiwan</option>
                    <option {{Input::old('country',$profile->country)=="Tajikistan"?"selected":""}} value="Tajikistan">Tajikistan</option>
                    <option {{Input::old('country',$profile->country)=="Tanzania"?"selected":""}} value="Tanzania">Tanzania</option>
                    <option {{Input::old('country',$profile->country)=="Thailand"?"selected":""}} value="Thailand">Thailand</option>
                    <option {{Input::old('country',$profile->country)=="Togo"?"selected":""}} value="Togo" >Togo</option>
                    <option {{Input::old('country',$profile->country)=="Tokelau"?"selected":""}} value="Tokelau">Tokelau</option>
                    <option {{Input::old('country',$profile->country)=="Tonga"?"selected":""}} value="Tonga">Tonga</option>
                    <option {{Input::old('country',$profile->country)=="Trinidad & Tobago"?"selected":""}} value="Trinidad & Tobago">Trinidad &amp; Tobago</option>
                    <option {{Input::old('country',$profile->country)=="Tunisia"?"selected":""}} value="Tunisia">Tunisia</option>
                    <option {{Input::old('country',$profile->country)=="Turkey"?"selected":""}} value="Turkey">Turkey</option>
                    <option {{Input::old('country',$profile->country)=="Turkmenistan"?"selected":""}} value="Turkmenistan">Turkmenistan</option>
                    <option {{Input::old('country',$profile->country)=="Turks & Caicos Is"?"selected":""}} value="Turks & Caicos Is">Turks &amp; Caicos Is</option>
                    <option {{Input::old('country',$profile->country)=="Tuvalu"?"selected":""}} value="Tuvalu">Tuvalu</option>
                    <option {{Input::old('country',$profile->country)=="Uganda"?"selected":""}} value="Uganda">Uganda</option>
                    <option {{Input::old('country',$profile->country)=="Ukraine"?"selected":""}} value="Ukraine">Ukraine</option>
                    <option {{Input::old('country',$profile->country)=="United Arab Emirates"?"selected":""}} value="United Arab Emirates">United Arab Emirates</option>
                    <option {{Input::old('country',$profile->country)=="United Kingdom"?"selected":""}} value="United Kingdom">United Kingdom</option>
                    <option {{Input::old('country',$profile->country)=="United States of America"?"selected":""}} value="United States of America">United States of America</option>
                    <option {{Input::old('country',$profile->country)=="Uruguay"?"selected":""}} value="Uruguay">Uruguay</option>
                    <option {{Input::old('country',$profile->country)=="Uzbekistan"?"selected":""}} value="Uzbekistan">Uzbekistan</option>
                    <option {{Input::old('country',$profile->country)=="Vanuatu"?"selected":""}} value="Vanuatu">Vanuatu</option>
                    <option {{Input::old('country',$profile->country)=="Vatican City State"?"selected":""}} value="Vatican City State">Vatican City State</option>
                    <option {{Input::old('country',$profile->country)=="Venezuela"?"selected":""}} value="Venezuela">Venezuela</option>
                    <option {{Input::old('country',$profile->country)=="Vietnam"?"selected":""}} value="Vietnam">Vietnam</option>
                    <option {{Input::old('country',$profile->country)=="Virgin Islands (Brit)"?"selected":""}} value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option {{Input::old('country',$profile->country)=="Virgin Islands (USA)"?"selected":""}} value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option {{Input::old('country',$profile->country)=="Wake Island"?"selected":""}} value="Wake Island">Wake Island</option>
                    <option {{Input::old('country',$profile->country)=="Wallis & Futana Is"?"selected":""}} value="Wallis & Futana Is">Wallis &amp; Futana Is</option>
                    <option {{Input::old('country',$profile->country)=="Yemen"?"selected":""}} value="Yemen">Yemen</option>
                    <option {{Input::old('country',$profile->country)=="Zaire"?"selected":""}} value="Zaire">Zaire</option>
                    <option {{Input::old('country',$profile->country)=="Zambia"?"selected":""}} value="Zambia">Zambia</option>
                    <option {{Input::old('country',$profile->country)=="Zimbabwe"?"selected":""}} value="Zimbabwe">Zimbabwe</option>
				</select>
			</div>
		</div>

		<div class="form-actions text-right">
			<label class="col-sm-2 control-label"></label>
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
</div>
{{Form::close()}}

@stop

@section('scripts')
{{HTML::style("/assets/plugins/datepicker/css/datepicker3.css")}}
{{HTML::script("/assets/plugins/datepicker/js/bootstrap-datepicker.js")}}
<script type="text/javascript">
    $('#birthday').datepicker({
       format: "dd-mm-yyyy"
    });
</script>
@stop