<?php
if (class_exists('PHP_CodeSniffer_Standards_CodingStandard', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_CodingStandard not found');
}

/**
 * Vendo Coding Standard Definition
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 */
class PHP_CodeSniffer_Standards_Vendo_VendoCodingStandard extends PHP_CodeSniffer_Standards_CodingStandard
{
	public function getIncludedSniffs()
	{
		return array(
			'PEAR',
			'Generic/Sniffs/PHP/UpperCaseConstantSniff.php',
		);
		/* current PEAR Sniffs - for reference
		return array(
			'Generic/Sniffs/NamingConventions/UpperCaseConstantNameSniff.php',
		    'Generic/Sniffs/PHP/LowerCaseConstantSniff.php',
		    'Generic/Sniffs/PHP/DisallowShortOpenTagSniff.php',
 			'PEAR/Sniffs/ControlStructures/MultiLineConditionSniff.php',
			'PEAR/Sniffs/NamingConventions/ValidClassNameSniff.php',
			'PEAR/Sniffs/Commenting/InlineCommentSniff.php',
			'PEAR/Sniffs/Commenting/FunctionCommentSniff.php',
			'PEAR/Sniffs/WhiteSpace/ScopeClosingBraceSniff.php',
			'PEAR/Sniffs/Functions/FunctionCallArgumentSpacingSniff.php',
			'PEAR/Sniffs/Functions/ValidDefaultValueSniff.php',
			'PEAR/Sniffs/Classes/ClassDeclarationSniff.php',
			'PEAR/Sniffs/Files/LineEndingsSniff.php',
			);
		 */
	}//end getIncludedSniffs()

	public function getExcludedSniffs()
	{
		return array(
			// replaced
			'PEAR/Sniffs/Commenting/FileCommentSniff.php',
			'PEAR/Sniffs/Commenting/ClassCommentSniff.php',
			'PEAR/Sniffs/NamingConventions/ValidFunctionNameSniff.php',
			'PEAR/Sniffs/NamingConventions/ValidVariableNameSniff.php',
			'PEAR/Sniffs/Functions/FunctionCallSignatureSniff.php',
 			'PEAR/Sniffs/ControlStructures/ControlSignatureSniff.php',
			'PEAR/Sniffs/Files/IncludingFileSniff.php',
			'PEAR/Sniffs/Files/LineLengthSniff.php',
			'PEAR/Sniffs/Functions/FunctionDeclarationSniff.php',
			//
			// eliminated
			'Generic/Sniffs/PHP/LowerCaseConstantSniff.php',
		    'Generic/Sniffs/WhiteSpace/DisallowTabIndentSniff.php',
			'PEAR/Sniffs/WhiteSpace/ScopeIndentSniff.php',
			'PEAR/Sniffs/Formatting/MultiLineAssignmentSniff.php',
			'PEAR/Sniffs/WhiteSpace/ObjectOperatorIndentSniff.php',
			'PEAR/Sniffs/ControlStructures/MultiLineConditionSniff.php',
			'PEAR/Sniffs/ControlStructures/InlineControlStructureSniff.php',
			);
	}//end getExcludedSniffs()

}//end class
?> 
