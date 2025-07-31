<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CaseInsensitiveUnique implements ValidationRule
{
    protected string $table;
    protected string $column;
    protected ?int $ignoreId;

    /**
     * @param string $table      - Table name (e.g. 'users')
     * @param string $column     - Column to check (e.g. 'email')
     * @param int|null $ignoreId - Optional: ID to ignore for updates
     */
    public function __construct(string $table, string $column, ?int $ignoreId = null)
    {
        $this->table = $table;
        $this->column = $column;
        $this->ignoreId = $ignoreId;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table($this->table)
            ->whereRaw("LOWER({$this->column}) = ?", [strtolower($value)]);

        if ($this->ignoreId) {
            $query->where('id', '!=', $this->ignoreId);
        }

        if ($query->exists()) {
            $fail("Email already exists");
        }
    }
}
