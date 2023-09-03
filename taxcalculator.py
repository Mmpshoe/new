def calculate_tax_liability(filing_status, taxable_income, deductions, credits):
    # Determine tax rate based on filing status and taxable income
    if filing_status == 'Single':
        if taxable_income <= 9950:
            tax_rate = 0.1
        elif taxable_income <= 40525:
            tax_rate = 0.12
        elif taxable_income <= 86375:
            tax_rate = 0.22
        elif taxable_income <= 164925:
            tax_rate = 0.24
        elif taxable_income <= 209425:
            tax_rate = 0.32
        elif taxable_income <= 523600:
            tax_rate = 0.35
        else:
            tax_rate = 0.37
    elif filing_status == 'Married Filing Jointly':
        if taxable_income <= 19900:
            tax_rate = 0.1
        elif taxable_income <= 81050:
            tax_rate = 0.12
        elif taxable_income <= 172750:
            tax_rate = 0.22
        elif taxable_income <= 329850:
            tax_rate = 0.24
        elif taxable_income <= 418850:
            tax_rate = 0
