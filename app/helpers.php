<?php
function getImage($image)
{
  return strpos($image, 'https') !== false ? $image : asset('storage/' . $image);
}

function getHour($date)
{
  $date = new DateTime($date);
  return $date->format('H:i');
}

function getDay($date)
{
  $date = new DateTime($date);
  return $date->format('d');
}

function getMonth($date)
{
  $date = new DateTime($date);
  return $date->format('F');
}

function getShortTime($date)
{
  $date = new DateTime($date);
  return $date->format('d.m.y');
}

function getFullTime($date)
{
  $date = new DateTime($date);
  return $date->format('d.m.y | H:m');
}
