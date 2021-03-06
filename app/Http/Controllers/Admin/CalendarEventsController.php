<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 23.10.2016
 * Time: 22:23
 */

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Session;

use App\Model\CalendarEvent;

class CalendarEventsController extends Controller
{
    /**
     * BlogsController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $start = Input::get('start');
        $end = Input::get('end');
        $events = CalendarEvent::getAllWithCategory($start, $end);
        return Response::json(array('events' => $events));
    }

    /**
     * store method
     * @return mixed
     */
    public function store()
    {
        CalendarEvent::create(array(
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'event_date' => Input::get('date'),
            'calendar_event_category_id' => Input::get('calendar_event_category_id')
        ));

        return Response::json(array('success' => true));
    }

    /**
     * update method
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $requestData = $request->all();
        $requestData['event_date'] = date('Y-m-d', strtotime($requestData['event_date']));

        $event = CalendarEvent::findOrFail($id);
        $event->update($requestData);

        return Response::json(['success' => true]);
    }


    /**
     * destroy method
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        CalendarEvent::destroy($id);

        return Response::json(['success' => true]);
    }

}
