<?php
/**
 * PEAR_Sniffs_NamingConventions_ValidVariableNameSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   CVS: $Id: ValidVariableNameSniff.php 261129 2008-06-13 04:10:43Z squiz $
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

if (class_exists('PHP_CodeSniffer_Standards_AbstractVariableSniff', true) === false) {
    $error = 'Class PHP_CodeSniffer_Standards_AbstractVariableSniff not found';
    throw new PHP_CodeSniffer_Exception($error);
}

/**
 * PEAR_Sniffs_NamingConventions_ValidVariableNameSniff.
 *
 * Checks the naming of member variables.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   Release: 1.2.0
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Vendo_Sniffs_NamingConventions_ValidVariableNameSniff extends PHP_CodeSniffer_Standards_AbstractVariableSniff
{
    /**
     * Processes class member variables.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    protected function processMemberVar(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $memberProps = $phpcsFile->getMemberProperties($stackPtr);
        if (empty($memberProps) === true) {
            return;
        }

        $memberName     = ltrim($tokens[$stackPtr]['content'], '$');
        $scope          = $memberProps['scope'];
        $scopeSpecified = $memberProps['scope_specified'];

		// @scmod - Define these values, assume public
		$isPublic		= true;
		$isPrivate 		= false;
		$isProtected 	= false;

		if ($scopeSpecified && 'private' === $scope)
		{
			$isPrivate = true;
			$isPublic  = false;
		}
		if ($scopeSpecified && 'protected' === $scope)
		{
			$isProtected = true;
			$isPublic    = false;
		}

        // If it's a private member, it must have an underscore on the front.
        if ($isPrivate === true && $memberName{0} !== '_') {
            $error = "Private member variable \"$memberName\" must be prefixed with an underscore";
            $phpcsFile->addError($error, $stackPtr);
            return;
        }

		//@scmod - Kohana uses an underscore in front of protected members
		//         when overriding values in the model
		// If it's a public member, it must not have an underscore on the front.
        if ($isPublic === true && $scopeSpecified === true && $memberName{0} === '_') {
            $error = ucfirst($scope)." member variable \"$memberName\" must not be prefixed with an underscore";
            $phpcsFile->addError($error, $stackPtr);
            return;
        }

    }//end processMemberVar()


    /**
     * Processes normal variables.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where this token was found.
     * @param int                  $stackPtr  The position where the token was found.
     *
     * @return void
     */
    protected function processVariable(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        // We don't care about normal variables.
        return;

    }//end processVariable()


    /**
     * Processes variables in double quoted strings.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where this token was found.
     * @param int                  $stackPtr  The position where the token was found.
     *
     * @return void
     */
    protected function processVariableInString(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        // We don't care about normal variables.
        return;

    }//end processVariableInString()


}//end class

?>
