Zae\BigMath
=======

Easily work with big numbers with late static binding and chaining.

## Adapters ##
Supports multiple adapters, like bcmath and gmp.

## Late static binding ##
No need to create a new object, simply call the first function statically.

BigMath::Add("10");

## Chaining ##
Because the functions always return a new BigMath object, the function calls can be chained together.

BigMath::Add("10")->Sub("5")->Mul("2");

## Decimals ##
The default of the class is to use decimal numbers, if these are not required they can be disabled, this could
enable adapters that can't handle decimal numbers, like GMP.

### MIT ###
MIT Licensed