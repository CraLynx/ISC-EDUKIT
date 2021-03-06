<?php
	declare(strict_types = 1);
	namespace IEP\Structures;
  
  /*!
    
    \class Specialty specialty.class.php "iep/structures/specialty.class.php"
    \brief Класс, который описывает Специальность
    \author pmswga
    \version 1.0
        
    
  */
  
	class Specialty
	{
		private $id;            ///< Идентификатор
		private $code;          ///< Код специальности
		private $description;   ///< Описание
		private $file;          ///< Файл в формате pdf
    
    /*!
      \param[in] $code        - Код специальности
      \note Формат кода специальности "XX.XX.XX", где X - число от 0 до 9
      
      \param[in] $description - Описание специальности
      \param[in] $file        - Путь до файла специальности
      \note Файл в формате PDF
      
    */
		
		function __construct(string $code, string $description, string $file = "")
		{
			$this->code = $code;
			$this->description = $description;
			$this->file = $file;
			$this->id = 0;
		}
    
    /*!
      \brief Задаёт идентификатор
      \param[in] $id - Идентификатор специальности
    */
		
		public function setSpecialtyID(int $id)
		{
			$this->id = $id;
		}
    
    /*!
      \brief Возращает идентификатор специальности
      \return Идентификатор специальности
    */
		
		public function getSpecialtyID() : int
		{
			return $this->id;
		}
		
    /*!
      \brief Возращает код специальности
      \return Код специальности
      \note Формат кода специальности "XX.XX.XX", где X - число от 0 до 9
    */
    
		public function getCode() : string
		{
			return $this->code;
		}
    
    /*!
      \brief Возращает название специальности
      \return Название специальности
    */
		
		public function getDescription() : string
		{
			return $this->description;
		}
		
    /*!
      \brief Возращает файл специальности
      \return Путь до файла специальности
    */
    
		public function getFilepath() : string
		{
			return str_replace("/", "\\", $this->file);
		}
    
    /*!
      \brief Возращает имя файла специальности
      \return Имя файла специальности
    */
    
    public function getFilename() : string
    {
      return basename($this->file);
    }
		
    /*!
      \brief Задаёт файл специальности
      \return Задаёт путь до файла специальности
    */
    
    public function setFile(string $filename)
    {
      $this->file = $filename;
    }
    
	}
	
?>
