<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;

class ContactsController extends Controller
{
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index(Request $request, $user_id)
    {
        $input = $request->all();
        if($request->get('search')){
            $contact = Contact::where('user_id', $user_id)->where("name", "LIKE", "%{$request->get('search')}%")
                ->orWhere('created_at','LIKE',"%{$request->get('search')}%")
                ->paginate(5);
        }else{
            $contact = Contact::where('user_id', $user_id)->paginate(5);
        }
        return response($contact);
    }

    public function show($id,$user_id) {
        $contact = DB::table('contacts')
            ->select('contacts.email_address as email_address',
                'contacts.name as contact_name',
                'contacts.id as id',
                'contacts.status as status',
                'contacts.created_at as created_at',
                'contacts.number1 as phone_number1',
                'contacts.number2 as phone_number2',
                'contacts.postal_code as postal_code',
                'contacts.fax_number as fax_number',
                'addresses.address1 as address1',
                'countries.name as country_name',
                'locations.name as location_name',
                'states.name as state_name',
                'addresses.address2 as address2')
            ->join('addresses','addresses.id', '=' ,'contacts.address_id')
            ->join('countries','countries.id', '=' ,'addresses.country_id')
            ->join('states','states.id', '=' ,'addresses.state_id')
            ->join('locations','locations.id', '=' ,'addresses.location_id')
            ->where("contacts.user_id", $user_id)
            ->where('contacts.id',$id)
            ->get();

        return response($contact);
    }

    public function getAllActive($status, $user_id) {
        $contact = DB::table('contacts')
            ->select('contacts.email_address as email_address',
                'contacts.name as contact_name',
                'contacts.id as id',
                'contacts.status as status',
                'contacts.created_at as created_at',
                'contacts.number1 as phone_number1',
                'contacts.number2 as phone_number2',
                'contacts.postal_code as postal_code',
                'contacts.fax_number as fax_number',
                'addresses.address1 as address1',
                'countries.name as country_name',
                'locations.name as location_name',
                'states.name as state_name',
                'addresses.address2 as address2')
            ->join('addresses','addresses.id', '=' ,'contacts.address_id')
            ->join('countries','countries.id', '=' ,'addresses.country_id')
            ->join('states','states.id', '=' ,'addresses.state_id')
            ->join('locations','locations.id', '=' ,'addresses.location_id')
            ->where("contacts.status", $status)
            ->where("contacts.user_id", $user_id)
            ->orderBy('contacts.name', 'asc')
            ->get();

        return response($contact);
    }

    public function edit($id,$user_id) {
        $contact = DB::table('contacts')
            ->select('contacts.email_address as email_address',
                'contacts.name as name',
                'contacts.id as id',
                'addresses.id as address_id',
                'contacts.status as status',
                'contacts.created_at as created_at',
                'contacts.number1 as number1',
                'addresses.address1 as address1',
                'countries.id as country_id',
                'countries.name as country_name',
                'locations.id as location_id',
                'locations.name as location_name',
                'states.id as state_id',
                'states.name as state_name',
                'addresses.address2 as address2')
            ->join('addresses','addresses.id', '=' ,'contacts.address_id')
            ->join('countries','countries.id', '=' ,'addresses.country_id')
            ->join('states','states.id', '=' ,'addresses.state_id')
            ->join('locations','locations.id', '=' ,'addresses.location_id')
            ->where("contacts.user_id", $user_id)
            ->where('contacts.id',$id)
            ->get();

        return response($contact);
    }

    public function store(Request $request) {
        $user = new User();
        $user->fill(Input::get());
        $user->user_id = Auth::user()->id;

        $address = new Address();
        $address->address1 = $request['address1'];
        $address->address2 = $request['address2'];
        $address->country_id = $request['country_id'];
        $address->state_id = $request['state_id'];
        $address->location_id = $request['location_id'];
        $address->user_id = "$user->user_id";

        $address->save();

        $contact = new Contact();
        $contact->name = $request['name'];
        $contact->number1 = $request['number1'];
        $contact->number2 = $request['number2'];
        $contact->postal_code = $request['postal_code'];
        $contact->email_address = $request['email_address'];
        $contact->fax_number = $request['fax_number'];
        $contact->user_id = "$user->user_id";
        $contact->address_id = "$address->id";

        $contact->save();

        return response($contact);
    }

    public function destroy($id)
    {
        $contact = DB::delete('delete from contacts where id = ?',[$id]);
        return response($contact);
    }

    public function update(Request $request, $id)
    {
        $user = new User();
        $user->fill(Input::get());
        $user->user_id = Auth::user()->id;

        $address = new Address();
        $address->address1 = $request['address1'];
        $address->address2 = $request['address2'];
        $address->country_id = $request['country_id'];
        $address->state_id = $request['state_id'];
        $address->location_id = $request['location_id'];
        $address->user_id = "$user->user_id";

        $address->save();

        $contact = Contact::findOrFail($id);
        $contact->name = $request['name'];
        $contact->number1 = $request['number1'];
        $contact->number2 = $request['number2'];
        $contact->postal_code = $request['postal_code'];
        $contact->email_address = $request['email_address'];
        $contact->fax_number = $request['fax_number'];
        $contact->user_id = "$user->user_id";
        $contact->address_id = $address->id;

        $contact->save();

        return response($contact);

    }

    public  function disable(Request $request, $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->status = $request[0];
            $contact->updated_at = $request['$updated_at'];
            $contact->save();
            return response($contact);
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }




}
