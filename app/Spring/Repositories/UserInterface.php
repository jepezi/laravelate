<?php namespace Spring\Repositories;

interface UserInterface {

	public function create(array $data);
	public function update(array $data);

}