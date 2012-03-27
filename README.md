PHP class to remove PHP end tags from all files in a directory recursively
=====================

* Copyright (c) 2012, [http://www.phpgangsta.de](http://www.phpgangsta.de)
* Author: Michael Kliewe, [@PHPGangsta](http://twitter.com/PHPGangsta)
* Licensed under the BSD License.


This PHP class can be used to remove all PHP end tags (?>) from all .php files in a directory. If there
is exactly one ?> at the end of a file, it is removed. The script also makes sure to add one newline at
the end of the file.

It is good practice to remove the end tag in php-only files, see

- [http://de2.php.net/basic-syntax.instruction-separation](PHP manual)
- [http://framework.zend.com/manual/en/coding-standard.php-file-formatting.html](Zend Framework Coding Standard)
- [http://trac.symfony-project.org/wiki/HowToContributeToSymfony#CodingStandards](Symfony Coding Standard)
- [http://readthedocs.org/docs/doctrine/en/latest/en/manual/coding-standards.html#general](Doctrine Coding Standard)


Usage:
------

    # php RemovePhpEndTags.php testfiles

    Starting to process 6 files.
    skipping because there are no end tags: testfiles\withoutTag.php
    fixed file: testfiles\withTag.php
    skipping because the end tag is not at the end of the file: testfiles\withTagInTheMiddle.php
    fixed file: testfiles\withTagPlusMore.php
    fixed file: testfiles\withTagWithoutNewLine.php
    skipping because of >1 end tags found, maybe not a php-only file: testfiles\withTwoTag2.php


ToDo:
-----
- at the moment only unix newlines (\n) are detected and added at the end. That's bad for projects
with Windows line breaks.
- ???

Notes:
------
If you like this script or have some features to add: contact me, visit my blog, fork this project, send pull requests, you know how it works.