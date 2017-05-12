<?php


class Client
{
    /**
     * @var array
     */
    private $rawData;
    private $dbConnection;


    public function __construct($newClient = [])
    {
        // rise mysql connection
        $this->dbConnection = mysqli_connect('localhost', 'root', '', 'client');
        mysqli_set_charset($this->dbConnection, 'utf8');

        $this->setRawData($newClient);
    }

    public function __destruct()
    {
        // close mysql connection
        mysqli_close($this->dbConnection);
    }

    public function fetchById($id) {
        return $this->fetch('id', $id);
    }

    public function fetchByEmail($email) {
        return $this->fetch('email', $email);
    }

    public function fetchByFirstName($firstName) {
        return $this->fetch('first_name', $firstName);
    }

    private function fetch($field, $value)
    {
        $query = mysqli_query($this->dbConnection, 'SELECT * FROM Client WHERE `'. $field .'` = "'. $value .'"');
        $this->rawData = mysqli_fetch_assoc($query);
    }

    public function fetchAll($search = null, $limit = 10) {

        $where = null;

        if ($search !== null) {
            $where = ' WHERE email LIKE "%'. $search .'%"';
        }

        $query = mysqli_query($this->dbConnection, 'SELECT * FROM Client'. $where .' LIMIT '. $limit);
        $data = [];

        while ($record = mysqli_fetch_assoc($query)) {
            $data[] = $record;
        }

        return $data;
    }


    public function delete()
    {
        $this->dbConnection->query('DELETE FROM Client WHERE id = '. $this->rawData['id']);
    }

    public function save()
    {
        $fields = array_keys($this->rawData);
        $values = array_values($this->rawData);

        $query = 'INSERT INTO Client (`'. join('`, `', $fields) .'`) VALUES ("'. join('", "', $values) .'") ON DUPLICATE KEY UPDATE ';
        $updateSegments = [];

        foreach ($this->rawData as $field => $value) {
            $updateSegments[] = '`'. $field .'` = "'. $value .'"';
        }

        $query .= join(', ', $updateSegments);

        $this->dbConnection->query($query) or die ($this->dbConnection->error);
    }


    /******************
     * GETTERS
     ******************/

    public function getRawData()
    {
        return $this->rawData;
    }

    public function getId()
    {
        return $this->rawData['id'];
    }

    public function getFirstName()
    {
        return $this->rawData['first_name'];
    }

    public function getSecondName()
    {
        return $this->rawData['second_name'];
    }

    public function getLastName()
    {
        return $this->rawData['last_name'];
    }

    public function getNote()
    {
        return $this->rawData['note'];
    }

    public function getEmail()
    {
        return $this->rawData['email'];
    }

    public function getIsActive()
    {
        return $this->rawData['is_active'];
    }

    /******************
     * SETTERS
     ******************/

    /**
     * @param array $rawData
     */
    public function setRawData($rawData)
    {
        $this->rawData = $rawData;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->rawData['first_name'] = $firstName;
    }

    /**
     * @param string $secondName
     */
    public function setSecondName($secondName)
    {
        $this->rawData['second_name'] = $secondName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->rawData['last_name'] = $lastName;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->rawData['note'] = $note;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->rawData['email'] = $email;
    }

    /**
     * @param string $isActive
     */
    public function setIsActive($isActive)
    {
        $this->rawData['is_active'] = (int) $isActive;
    }
}

