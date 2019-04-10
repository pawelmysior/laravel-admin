<?php

function attribute(string $name): string
{
    return ucfirst(__("validation.attributes.{$name}"));
}
