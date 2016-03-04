<?php

namespace Base;

use \Server as ChildServer;
use \ServerQuery as ChildServerQuery;
use \Exception;
use \PDO;
use Map\ServerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'server' table.
 *
 *
 *
 * @method     ChildServerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildServerQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildServerQuery orderByCeleryUsername($order = Criteria::ASC) Order by the celery_username column
 * @method     ChildServerQuery orderByCeleryPassword($order = Criteria::ASC) Order by the celery_password column
 *
 * @method     ChildServerQuery groupById() Group by the id column
 * @method     ChildServerQuery groupByIp() Group by the ip column
 * @method     ChildServerQuery groupByCeleryUsername() Group by the celery_username column
 * @method     ChildServerQuery groupByCeleryPassword() Group by the celery_password column
 *
 * @method     ChildServerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildServerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildServerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildServerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildServerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildServerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildServer findOne(ConnectionInterface $con = null) Return the first ChildServer matching the query
 * @method     ChildServer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildServer matching the query, or a new ChildServer object populated from the query conditions when no match is found
 *
 * @method     ChildServer findOneById(int $id) Return the first ChildServer filtered by the id column
 * @method     ChildServer findOneByIp(string $ip) Return the first ChildServer filtered by the ip column
 * @method     ChildServer findOneByCeleryUsername(string $celery_username) Return the first ChildServer filtered by the celery_username column
 * @method     ChildServer findOneByCeleryPassword(string $celery_password) Return the first ChildServer filtered by the celery_password column *

 * @method     ChildServer requirePk($key, ConnectionInterface $con = null) Return the ChildServer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServer requireOne(ConnectionInterface $con = null) Return the first ChildServer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildServer requireOneById(int $id) Return the first ChildServer filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServer requireOneByIp(string $ip) Return the first ChildServer filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServer requireOneByCeleryUsername(string $celery_username) Return the first ChildServer filtered by the celery_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildServer requireOneByCeleryPassword(string $celery_password) Return the first ChildServer filtered by the celery_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildServer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildServer objects based on current ModelCriteria
 * @method     ChildServer[]|ObjectCollection findById(int $id) Return ChildServer objects filtered by the id column
 * @method     ChildServer[]|ObjectCollection findByIp(string $ip) Return ChildServer objects filtered by the ip column
 * @method     ChildServer[]|ObjectCollection findByCeleryUsername(string $celery_username) Return ChildServer objects filtered by the celery_username column
 * @method     ChildServer[]|ObjectCollection findByCeleryPassword(string $celery_password) Return ChildServer objects filtered by the celery_password column
 * @method     ChildServer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ServerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ServerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Server', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildServerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildServerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildServerQuery) {
            return $criteria;
        }
        $query = new ChildServerQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildServer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ServerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ServerTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildServer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ip, celery_username, celery_password FROM server WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildServer $obj */
            $obj = new ChildServer();
            $obj->hydrate($row);
            ServerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildServer|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ServerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ServerTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ServerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ServerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%'); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ip)) {
                $ip = str_replace('*', '%', $ip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServerTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Filter the query on the celery_username column
     *
     * Example usage:
     * <code>
     * $query->filterByCeleryUsername('fooValue');   // WHERE celery_username = 'fooValue'
     * $query->filterByCeleryUsername('%fooValue%'); // WHERE celery_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $celeryUsername The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function filterByCeleryUsername($celeryUsername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($celeryUsername)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $celeryUsername)) {
                $celeryUsername = str_replace('*', '%', $celeryUsername);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServerTableMap::COL_CELERY_USERNAME, $celeryUsername, $comparison);
    }

    /**
     * Filter the query on the celery_password column
     *
     * Example usage:
     * <code>
     * $query->filterByCeleryPassword('fooValue');   // WHERE celery_password = 'fooValue'
     * $query->filterByCeleryPassword('%fooValue%'); // WHERE celery_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $celeryPassword The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function filterByCeleryPassword($celeryPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($celeryPassword)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $celeryPassword)) {
                $celeryPassword = str_replace('*', '%', $celeryPassword);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServerTableMap::COL_CELERY_PASSWORD, $celeryPassword, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildServer $server Object to remove from the list of results
     *
     * @return $this|ChildServerQuery The current query, for fluid interface
     */
    public function prune($server = null)
    {
        if ($server) {
            $this->addUsingAlias(ServerTableMap::COL_ID, $server->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the server table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ServerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ServerTableMap::clearInstancePool();
            ServerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ServerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ServerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ServerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ServerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ServerQuery
