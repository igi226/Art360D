<?php
namespace App\Core\Style;

interface StyleInterface {
public function getAllStyles();
public function createStyle(array $data);
public function getStyle($slug);
public function updateStyle(array $data, $slug);
public function deleteStyle($slug);

}
