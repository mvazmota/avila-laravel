<?php
/**
 * API-EXAMPLE NEWS TDI 2016
 *
 * Api de testes para a aulas de TDI ano letivo 2016/2017
 *
 * @author Nuno Ribeiro
 *
 * @copyright ©nrgribeiro 2016
 *
 * @api API-EXAMPLE TDI 2016
 */


namespace App\Http\Controllers;

use App\Http\Requests;
use App\News;
use App\Tools;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller
{

    //
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }


    /**
     * List All News
     *
     * Listagem de todas as notícias existentes em base de dados
     *
     * @return array
     */
    public function index()
    {
        header('Access-Control-Allow-Origin: *');

        $news = News::get();

        return $news;
    }

    /**
     * News Detail
     *
     * Detalhe de uma notícia
     *
     * @param int $id Id da notícia em base de dados
     *
     * @return array
     */
    public function show($id)
    {
        $news = News::whereId($id)->first();

        return $news;
    }

     /**
      * News Insert
     *
     * Inserir uma nova notícia em base de dados
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */
    public function store(Request $request)
    {

        header('Access-Control-Allow-Origin: *');

        $data = $request->all();

        $validator = Validator::make($data, [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image'
            ],
            [
                'title' => 'O campo de título é obrigatório',
                'description' => 'O campo de descrição é obrigatório',
                'image' => 'O campo de imagem é obrigatório',
            ]);
        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 1, 'NOK');
        }

        // generate filename from random string
        $path = $request->file('image')->hashName();
        // upload process
        $request->file('image')->move(public_path('images'), $path);

        // adds to database
        $news = News::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $path,
        ]);

        return $news;
    }


    /**
     * News Delete
     *
     * Apagar uma notícia da base de dados
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {

        $news = News::whereId($id)->first();
        $news->destroy();

        return $this->_result('Notícia removida com sucesso');

    }

    /**
     * News Update
     *
     * Atualizar uma notícia em base de dados
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $news = News::whereId($id)->first();

        $news->title = $data['title'];
        $news->description = $data['description'];
        $news->save();

        return $news;
    }

    /**
     * @hideFromAPIDocumentation
     */
    public function create()
    {

    }

    /**
     * @hideFromAPIDocumentation
     */
    public function edit($id)
    {

    }



    private function _result($data, $status = 0, $msg = 'OK')
    {
        return json_encode(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ));
    }

}
