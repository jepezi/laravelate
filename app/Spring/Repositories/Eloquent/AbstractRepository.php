<?php namespace Spring\Repositories\Eloquent;

use StdClass;
use Illuminate\Support\MessageBag;

abstract class AbstractRepository {

  /**
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $model;

  /**
   * @var Illuminate\Support\MessageBag
   */
  protected $errors;

  /**
   * Construct
   *
   * @param Illuminate\Support\MessageBag $errors
   */
  public function __construct(MessageBag $errors)
  {
    $this->errors = $errors;
  }

  /**
   * Make a new instance of the entity to query on
   *
   * @param array $with
   */
  public function make(array $with = array())
  {
    return $this->model->with($with);
  }

  /**
   * Create
   *
   * @param array $data
   * @return Illuminate\Database\Eloquent\Model
   */
  public function create(array $data)
  {
    
    $model = $this->model->fill($data);

    if ($model->save())
    {
      return $model;
    }

    return false;
  }

  public function update(array $data)
  {

    $model = $this->model->find($data['id']);

    $model->fill($data);
    
    if ($model->save())
    {
      return $model;
    }

    return false;
  }

  /**
   * Retrieve all entities
   *
   * @param array $with
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function all(array $with = array())
  {
    $entity = $this->make($with);

    return $entity->get();
  }

  /**
   * Find a single entity
   *
   * @param int $id
   * @param array $with
   * @return Illuminate\Database\Eloquent\Model
   */
  public function find($id, array $with = array())
  {
    $entity = $this->make($with);

    return $entity->find($id);
  }

  /**
  * Get Results by Page
  *
  * @param int $page
  * @param int $limit
  * @param array $with
  * @return StdClass Object with $items and $totalItems for pagination
  */
  public function getByPage($page = 1, $limit = 10, $with = array())
  {
    $result             = new StdClass;
    $result->page       = $page;
    $result->limit      = $limit;
    $result->totalItems = 0;
    $result->items      = array();

    $query = $this->make($with);

    $users = $query->skip($limit * ($page - 1))
                  ->orderBy('created_at','desc')
                   ->take($limit)
                   ->get();

    $result->totalItems = $this->model->count();
    $result->items      = $users->all();

    return $result;
  }

  /**
   * Search for many results by key and value
   *
   * @param string $key
   * @param mixed $value
   * @param array $with
   * @return Illuminate\Database\Query\Builders
   */
  public function getManyBy($key, $value, array $with = array())
  {
    return $this->make($with)->where($key, '=', $value)->orderBy('created_at','desc')->get();
  }

  /**
   * Search a single result by key and value
   *
   * @param string $key
   * @param mixed $value
   * @param array $with
   * @return Illuminate\Database\Query\Builders
   */
  public function getFirstBy($key, $value, array $with = array())
  {
    return $this->make($with)->where($key, '=', $value)->first();
  }

  /**
   * Return the errors
   *
   * @return Illuminate\Support\MessageBag
   */
  public function errors()
  {
    return $this->errors;
  }

}