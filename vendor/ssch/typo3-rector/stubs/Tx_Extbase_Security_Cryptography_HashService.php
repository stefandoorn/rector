<?php

namespace RectorPrefix20210907;

if (\class_exists('Tx_Extbase_Security_Cryptography_HashService')) {
    return;
}
class Tx_Extbase_Security_Cryptography_HashService
{
}
\class_alias('Tx_Extbase_Security_Cryptography_HashService', 'Tx_Extbase_Security_Cryptography_HashService', \false);
