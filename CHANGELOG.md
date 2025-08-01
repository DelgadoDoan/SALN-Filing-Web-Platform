# CHANGELOG

All notable changes to the **SALN Filing Web Platform** will be documented here.

# [1.1.8] - 2025-07-31

### Added
- Added **favicon**.

### Changed/Fixed
- Fixed spouse **house zip code** when address is declared to be the same as declarant's.
- Removed support for **additional pages**.
- Set **filing type** field default to **not applicable**.
- Removed **arrows (incrementers)** for **number** type fields.

## [1.1.7] - 2025-07-29

### Added
- Added **SALN export PDF** feature.

### Changed/Fixed
- Updated **navbar UI**.
- Adjusted **form page UI** for mobile/smaller screens.

## [1.1.6] - 2025-07-21

### Added
- Added **dropdown selects** for declarant and spouse house and office address (**region**, **city/municipality**, and **barangay**).
- Added **tickboxes** to copy declarant **house and office address** to spouse's.

### Changed/Fixed
- **hasSameHouseAsDeclarant** and **hasSameOfficeAsDeclarant** fields added to JSON file structure.
- Added support for **same office and house address as declarant** tickboxes in importing/exporting JSON.
- Fixed rendering on **mobile devices**.
- Made email validation on login and signup **case-insensitive**.
- Email login (if email is **not in database**) will now also **redirect to link sent page**.

## [1.1.5] - 2025-07-16

### Changed/Fixed
- Fixed error upon **exporting blank form** (can now export blank form).
- Fixed **SALN form duplication** in database upon saving.
- Fixed fields with **extendable rows** not updating on add and delete.
- Fixed **Relatives in Government Service** rows not saving data in additional rows.
- Fixed **spouse fields** not displaying.
- Extended **token duration** from **4** to **6 hours**.
  
## [1.1.4] - 2025-07-15

### Added
- **JSON export** feature
- Alert messages on **any unsaved form changes** before exporting JSON.

### Changed/Fixed
- Adjusted button formatting for **save**, **export**, and **delete**.
- Added missing fields in form for declarant's and spouse's **office position** and **office no**.
- Fixed **date formatting** on export JSON.

## [1.1.3] - 2025-07-14

### Changed/Fixed
- Fixed '**not found**' http error upon clicking magic link.

## [1.1.2] - 2025-07-10

### Added
- **Save form data** feature
- **Account deletion** also deletes saved form data associated with the account.

### Changed/Fixed
- **Liabilities** table data now shows in form page.
- **DATE type data** in the database now shows in form page.
- **Relative name** field split into **family name**, **first name**, and **middle initial**.
- **hasBusinessInterests** and **hasRelativesInGovermentService** field in JSON file changed to **hasNoBusinessInterests** and **hasNoRelativesInGovermentService** 
- **'SALN Form submitted'** changed to **'SALN Form saved'**.
- **'SALN Form saved'** message adjusted to be shown better.
- **Account deletion warning message** now informs user that form data saved associated with it will also be deleted permanently.

## [1.1.1] - 2025-07-09

### Added
- **JSON import** feature
- **Homepage redirects** added to **login** and **signup** page in case user tries to signup/login even when already logged in. 

### Changed/Fixed
- **Cookies support removed** - session time now relies on magic link token.
  - avoids magic token database table from being too cluttered (i.e. multiple tokens for one user) 

## [1.1.0] - 2025-07-08

### Added
- **Magic link URL** now has randomly generated string appended to it.
- **"Spouse _ Information"** auto-numbers each additional spouse (e.g., Spouse 1, Spouse 2, etc.).
- **Remove button** added for additional spouses (except the first one).
- **Remove row functionality** added for Assets, Liabilities, and Unmarried Children sections (rows beyond the first can be deleted).
- **Subtotal calculations** for:
  - Real Properties (`Acquisition Cost`)
  - Personal Properties (`Acquisition Cost`)
  - Liabilities (`Outstanding Balance`)
- **Net Worth** field auto-calculates as `Total Assets - Total Liabilities`.
- **Unmarried Children** section starts with no rows by default.

### Changed/Fixed
- **Magic link email template** now shows how long link will expire.
- **Magic link URL** is now placed inside an anchor text "here".
- **"Add Row" buttons** renamed to **"Add Another Entry"** for clarity.
- **Unmarried Children button** label changed to **"Add Unmarried Child"**."

---

