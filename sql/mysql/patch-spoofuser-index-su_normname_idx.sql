-- The mysql schema was using an unnamed index in the create statement.
-- mysql than used the name of the first column as index name
-- Change it to the name used by sqlite/postgres instead
DROP INDEX su_normalized ON  /*_*/spoofuser;
CREATE INDEX su_normname_idx ON  /*_*/spoofuser (su_normalized, su_name);
