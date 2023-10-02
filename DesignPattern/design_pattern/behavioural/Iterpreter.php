<?php
/*
The Interpreter pattern is a behavioral pattern that specifies how to evaluate sentences in a language. The pattern defines a language, a grammar for the language, and an interpreter that uses the grammar to interpret sentences in the language. The Interpreter pattern is commonly used in text processing applications, such as compilers and interpreters.

The pattern is made up of three main components:

Abstract Expression: This is the abstract base class for all expressions in the language. It defines an interface for interpreting an expression in the language.

Terminal Expression: This represents a terminal expression in the language. It implements the Abstract Expression interface and provides an implementation for interpreting the expression.

Non-terminal Expression: This represents a non-terminal expression in the language. It also implements the Abstract Expression interface and provides an implementation for interpreting the expression.*/

interface Expression
{
    public function interpret(Context $context): bool;
}

class TerminalExpression implements Expression
{
    private string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function interpret(Context $context): bool
    {
        return $context->contains($this->data);
    }
}

class OrExpression implements Expression
{
    private Expression $expr1;
    private Expression $expr2;

    public function __construct(Expression $expr1, Expression $expr2)
    {
        $this->expr1 = $expr1;
        $this->expr2 = $expr2;
    }

    public function interpret(Context $context): bool
    {
        return $this->expr1->interpret($context) || $this->expr2->interpret($context);
    }
}

class Context
{
    private string $text;
    function __construct(string $text)
    {
        $this->text   = $text;
    }

    function contains(string $string): bool
    {
        return preg_match('/' . $this->text . '/', $string);
    }
}

$context = new Context("The quick brown fox jumps over the lazy dog");

$expr1 = new TerminalExpression("fox");
$expr2 = new TerminalExpression("dog");

$orExpr = new OrExpression($expr1, $expr2);

echo $orExpr->interpret($context); // Output: true
