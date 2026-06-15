@echo off
setlocal
cd /d "%~dp0"

where py >nul 2>nul
if %errorlevel%==0 (
    set PYTHON_CMD=py
) else (
    set PYTHON_CMD=python
)

%PYTHON_CMD% -m pip install --upgrade pip
%PYTHON_CMD% -m pip install pypdf ebooklib beautifulsoup4 lxml

if not exist "Do konwersji" mkdir "Do konwersji"
if not exist "Przekonwertowane" mkdir "Przekonwertowane"

%PYTHON_CMD% haptireader_converter.py
pause
