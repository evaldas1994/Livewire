<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Template extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_template';

    protected $perPage = 500;

    public static $operationTypes = [
        'P',
        'N',
        'E',
        'A',
        'I',
        'R',
        'Z',
        'J',
        'U',
        'K',
        'V',
        'D',
        'S',
        'L',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_op',
        'f_description1',
        'f_cred_account1',
        'f_deb_account1',
        'f_name',
        'f_description2',
        'f_cred_account2',
        'f_deb_account2',
        'f_description3',
        'f_cred_account3',
        'f_deb_account3',
        'f_description4',
        'f_cred_account4',
        'f_deb_account4',
        'f_description5',
        'f_cred_account5',
        'f_deb_account5',
        'f_description6',
        'f_cred_account6',
        'f_deb_account6',
        'f_description7',
        'f_cred_account7',
        'f_deb_account7',
        'f_description8',
        'f_cred_account8',
        'f_deb_account8',
        'f_description9',
        'f_cred_account9',
        'f_deb_account9',
        'f_description10',
        'f_cred_account10',
        'f_deb_account10',
        'f_description11',
        'f_cred_account11',
        'f_deb_account11',
        'f_description12',
        'f_cred_account12',
        'f_deb_account12',
        'f_description13',
        'f_cred_account13',
        'f_deb_account13',
        'f_description14',
        'f_cred_account14',
        'f_deb_account14',
        'f_description15',
        'f_cred_account15',
        'f_deb_account15',
        'f_description16',
        'f_cred_account16',
        'f_deb_account16',
        'f_create_userid',
        'f_modified_userid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_description17',
        'f_description18',
        'f_description19',
        'f_deb_account17',
        'f_deb_account18',
        'f_deb_account19',
        'f_cred_account17',
        'f_cred_account18',
        'f_cred_account19',
        'f_description20',
        'f_cred_account20',
        'f_deb_account20',
        'f_description21',
        'f_cred_account21',
        'f_deb_account21',
        'f_description22',
        'f_cred_account22',
        'f_deb_account22',
        'f_consignment',
        'f_primary_document',
        'f_invoice_register',
        'f_description23',
        'f_cred_account23',
        'f_deb_account23',
        'f_groupid',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'f_id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'f_create_date';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'f_modified_date';

    /**
     * Get the template's stock operations group.
     */
    public function stockOperationGroup()
    {
        return $this->hasOne(StockOperationGroup::class, 'f_id', 'f_groupid');
    }

    /**
     * Get the template's credit account 1.
     */
    public function creditAccount1()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account1');
    }

    /**
     * Get the template's credit account 2.
     */
    public function creditAccount2()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account2');
    }

    /**
     * Get the template's credit account 3.
     */
    public function creditAccount3()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account3');
    }

    /**
     * Get the template's credit account 4.
     */
    public function creditAccount4()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account4');
    }

    /**
     * Get the template's credit account 5.
     */
    public function creditAccount5()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account5');
    }

    /**
     * Get the template's credit account 6.
     */
    public function creditAccount6()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account6');
    }

    /**
     * Get the template's credit account 7.
     */
    public function creditAccount7()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account7');
    }

    /**
     * Get the template's credit account 8.
     */
    public function creditAccount8()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account8');
    }

    /**
     * Get the template's credit account 9.
     */
    public function creditAccount9()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account9');
    }

    /**
     * Get the template's credit account 10.
     */
    public function creditAccount10()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account10');
    }

    /**
     * Get the template's credit account 11.
     */
    public function creditAccount11()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account11');
    }

    /**
     * Get the template's credit account 12.
     */
    public function creditAccount12()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account12');
    }

    /**
     * Get the template's credit account 13.
     */
    public function creditAccount13()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account13');
    }

    /**
     * Get the template's credit account 14.
     */
    public function creditAccount14()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account14');
    }

    /**
     * Get the template's credit account 15.
     */
    public function creditAccount15()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account15');
    }

    /**
     * Get the template's credit account 16.
     */
    public function creditAccount16()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account16');
    }

    /**
     * Get the template's credit account 17.
     */
    public function creditAccount17()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account17');
    }

    /**
     * Get the template's credit account 18.
     */
    public function creditAccount18()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account18');
    }

    /**
     * Get the template's credit account 19.
     */
    public function creditAccount19()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account19');
    }

    /**
     * Get the template's credit account 20.
     */
    public function creditAccount20()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account20');
    }

    /**
     * Get the template's credit account 21.
     */
    public function creditAccount21()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account21');
    }

    /**
     * Get the template's credit account 22.
     */
    public function creditAccount22()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account22');
    }

    /**
     * Get the template's credit account 23.
     */
    public function creditAccount23()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_account23');
    }

    /**
     * Get the template's debit account 1.
     */
    public function debitAccount1()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account1');
    }

    /**
     * Get the template's debit account 2.
     */
    public function debitAccount2()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account2');
    }

    /**
     * Get the template's debit account 3.
     */
    public function debitAccount3()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account3');
    }

    /**
     * Get the template's debit account 4.
     */
    public function debitAccount4()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account4');
    }

    /**
     * Get the template's debit account 5.
     */
    public function debitAccount5()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account5');
    }

    /**
     * Get the template's debit account 6.
     */
    public function debitAccount6()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account6');
    }

    /**
     * Get the template's debit account 7.
     */
    public function debitAccount7()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account7');
    }

    /**
     * Get the template's debit account 8.
     */
    public function debitAccount8()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account8');
    }

    /**
     * Get the template's debit account 9.
     */
    public function debitAccount9()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account9');
    }

    /**
     * Get the template's debit account 10.
     */
    public function debitAccount10()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account10');
    }

    /**
     * Get the template's debit account 11.
     */
    public function debitAccount11()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account11');
    }

    /**
     * Get the template's debit account 12.
     */
    public function debitAccount12()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account12');
    }

    /**
     * Get the template's debit account 13.
     */
    public function debitAccount13()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account13');
    }

    /**
     * Get the template's debit account 14.
     */
    public function debitAccount14()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account14');
    }

    /**
     * Get the template's debit account 15.
     */
    public function debitAccount15()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account15');
    }

    /**
     * Get the template's debit account 16.
     */
    public function debitAccount16()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account16');
    }

    /**
     * Get the template's debit account 17.
     */
    public function debitAccount17()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account17');
    }

    /**
     * Get the template's debit account 18.
     */
    public function debitAccount18()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account18');
    }

    /**
     * Get the template's debit account 19.
     */
    public function debitAccount19()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account19');
    }

    /**
     * Get the template's debit account 20.
     */
    public function debitAccount20()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account20');
    }

    /**
     * Get the template's debit account 21.
     */
    public function debitAccount21()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account21');
    }

    /**
     * Get the template's debit account 22.
     */
    public function debitAccount22()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account22');
    }

    /**
     * Get the template's debit account 23.
     */
    public function debitAccount23()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_debit_account23');
    }

    /**
     * Get the template reasons for the template.
     */
    public function templateReasons()
    {
        return $this->hasMany(TemplateReason::class, 'f_templateid', 'f_id');
    }
}
