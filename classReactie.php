<?php
//Bericht.php

declare(strict_types=1);

class Reactie
{

	public function __construct(int $id, string $gast, string $reactie, string $datum)
	{
		$this->id = $id;
		$this->gast = $gast;
		$this->reactie = $reactie;
		$this->datum = $datum;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getGast(): string
	{
		return $this->gast;
	}

	public function getReactie(): string
	{
		return $this->reactie;
	}

	public function getDatum(): string
	{
		return $this->datum;
	}
}
