<?php

/**
 * LoopStatement
 *
 * Loop statement, infinite loop
 */
class LoopStatement
{
	protected $_statement;

	public function __construct($statement)
	{
		$this->_statement = $statement;
	}

	/**
	 *
	 */
	public function compile(CompilationContext $compilationContext)
	{

		$compilationContext->codePrinter->output('while (1) {');

		/**
		 * Variables are initialized in a different way inside cycle
		 */
		$compilationContext->insideCycle++;

		/**
		 * Compile statements in the 'loop' block
		 */
		if (isset($this->_statement['statements'])) {
			$st = new StatementsBlock($this->_statement['statements']);
			$st->compile($compilationContext);
		}

		$compilationContext->insideCycle--;

		$compilationContext->codePrinter->output('}');

	}

}