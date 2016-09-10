<?php
class CKFinder_Connector_CommandHandler_CommandHandlerBase
{
    var $_connector;
    var $_currentFolder;
    var $_errorHandler;

    function CKFinder_Connector_CommandHandler_CommandHandlerBase()
    {
        $this->_currentFolder =& CKFinder_Connector_Core_Factory::getInstance("Core_FolderHandler");
        $this->_connector =& CKFinder_Connector_Core_Factory::getInstance("Core_Connector");
        $this->_errorHandler =& $this->_connector->getErrorHandler(); 
    }

    /**
     * Get Folder Handler
     *
     * @return CKFinder_Connector_Core_FolderHandler
     * @access public
     */
    function getFolderHandler()
    {
        if (is_null($this->_currentFolder)) {
            $this->_currentFolder =& CKFinder_Connector_Core_Factory::getInstance("Core_FolderHandler");
        }

        return $this->_currentFolder;
    }

    /**
     * Check whether Connector is enabled
     * @access protected
     *
     */
    function checkConnector()
    {
        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        if (!$_config->getIsEnabled()) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_CONNECTOR_DISABLED);
        }
    }

    /**
     * Check request
     * @access protected
     *
     */
    function checkRequest()
    {
        if (preg_match(",(/\.)|[[:cntrl:]]|(//)|(\\\\)|([\:\*\?\"\<\>\|]),", $this->_currentFolder->getClientPath())) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_NAME);
        }

        $_resourceTypeConfig = $this->_currentFolder->getResourceTypeConfig();
        
        if (is_null($_resourceTypeConfig)) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_TYPE);
        }

        
        $_clientPath = $this->_currentFolder->getClientPath();
        $_clientPathParts = explode("/", trim($_clientPath, "/"));
        if ($_clientPathParts) {
            foreach ($_clientPathParts as $_part) {
                if ($_resourceTypeConfig->checkIsHiddenFolder($_part)) {
                    $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_REQUEST);
                }
            }
        }
                
        if (!is_dir($this->_currentFolder->getServerPath())) {
            if ($_clientPath == "/") {
                if (!CKFinder_Connector_Utils_FileSystem::createDirectoryRecursively($this->_currentFolder->getServerPath())) {
                    /**
                     * @todo handle error
                     */
                }
            }
            else {
                $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_FOLDER_NOT_FOUND);
            }
        }
    }
}