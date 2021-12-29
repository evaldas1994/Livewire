<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Partner extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_partner';

    protected $perPage = 500;

    public static $legalStatusTypes = [
        '0',
        'F',
        'J',
    ];

    public static $priceLevelTypes = [
        '1',
        '2',
        '3',
        '4',
        '5',
    ];

    public static $sexTypes = [
        '0',
        'M',
        'F',
    ];

    public static $ediExportTypes = [
      '0',
      '1',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_name2',
        'f_buyer',
        'f_seller',
        'f_groupid',
        'f_code',
        'f_vat_code',
        'f_person',
        'f_post',
        'f_phone',
        'f_fax',
        'f_email',
        'f_address',
        'f_curid',
        'f_credit',
        'f_pay_days',
        'f_price_level',
        'f_partnerid',
        'f_accountid1',
        'f_accountid2',
        'f_messagegroupid',
        'f_direct_debit',
        'f_direct_debit_bank',
        'f_direct_debit_code',
        'f_direct_debit_no',
        'f_direct_debit_limit',
        'f_direct_debit_date1',
        'f_direct_debit_date2',
        'f_f1',
        'f_f2',
        'f_f3',
        'f_f4',
        'f_f5',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_departmentid',
        'f_personid',
        'f_projectid',
        'f_locked',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_pay_in_cash',
        'f_discount_card',
        'f_discount_card_active',
        'f_discount_card_balance',
        'f_sex',
        'f_birthday',
        'f_discount_card_use_count',
        'f_discount_card_last_use_date',
        'f_discount_card_balance2',
        'f_notgenerate_sale_price',
        'f_notgenerate_purch_price',
        'f_iln_edisoft',
        'f_act_url',
        'f_discount_card_balance3',
        'f_discount_card_balance3_date',
        'f_edi_storeid',
        'f_country',
        'f_legal_status',
        'f_templateid',
        'f_templateid2',
        'f_vatid',
        'f_edi_export',
        'f_mark1',
        'f_mark2',
        'f_mark3',
        'f_mark4',
        'f_mark5',
        'f_use_pay_days',
        'f_edi_delivery_iln',
        'f_send_on_increase',
        'f_send_on_decrease',
        'f_send_weekly',
        'f_sms_text1',
        'f_sms_text2',
        'f_sms_text3',
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
     * Get the partner's partner group.
     */
    public function partnerGroup()
    {
        return $this->hasOne(PartnerGroup::class, 'f_id', 'f_groupid');
    }

    /**
     * Get the partner's currency.
     */
    public function currency()
    {
        return $this->hasOne(Currency::class, 'f_id', 'f_curid');
    }

    /**
     * Get the partner's partner.
     */
    public function partner()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid');
    }

    /**
     * Get the partner's buyer account.
     */
    public function buyerAccount()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_accountid1');
    }

    /**
     * Get the partner's seller account.
     */
    public function sellerAccount()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_accountid2');
    }

    /**
     * Get the partner's message group.
     */
    public function messageGroup()
    {
        return $this->hasOne(MessageGroup::class, 'f_id', 'f_messagegroupid');
    }

    /**
     * Get the partner's register1.
     */
    public function register1()
    {
        return $this->hasOne(Register1::class, 'f_id', 'f_r1id');
    }

    /**
     * Get the partner's register2.
     */
    public function register2()
    {
        return $this->hasOne(Register2::class, 'f_id', 'f_r2id');
    }

    /**
     * Get the partner's register3.
     */
    public function register3()
    {
        return $this->hasOne(Register3::class, 'f_id', 'f_r3id');
    }

    /**
     * Get the partner's register4.
     */
    public function register4()
    {
        return $this->hasOne(Register4::class, 'f_id', 'f_r4id');
    }

    /**
     * Get the partner's register5.
     */
    public function register5()
    {
        return $this->hasOne(Register5::class, 'f_id', 'f_r5id');
    }

    /**
     * Get the partner's department.
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'f_id', 'f_departmentid');
    }

    /**
     * Get the partner's person.
     */
    public function person()
    {
        return $this->hasOne(Person::class, 'f_id', 'f_personid');
    }

    /**
     * Get the partner's project.
     */
    public function project()
    {
        return $this->hasOne(Project::class, 'f_id', 'f_projectid');
    }

    /**
     * Get the partner's vat.
     */
    public function vat()
    {
        return $this->hasOne(Vat::class, 'f_id', 'f_vatid');
    }

    /**
     * Get the partner's direct debit bank.
     */
    public function directDebitBank()
    {
        return $this->hasOne(Bank::class, 'f_id', 'f_direct_debit_bank');
    }

    /**
     * Get the partner's edi store.
     */
    public function ediStore()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_edi_storeid');
    }

    /**
     * Get the bank accounts for the partner.
     */
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class, 'f_partnerid', 'f_id');
    }

    /**
     * Get the contacts for the partner.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'f_partnerid', 'f_id');
    }

    /**
     * Get the discount card points for the partner.
     */
    public function discountCardPoints()
    {
        return $this->hasMany(DiscountCardPoint::class, 'f_partnerid', 'f_id');
    }
}

